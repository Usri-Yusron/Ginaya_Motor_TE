<?php

namespace App\Http\Controllers\User;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OtpVerification;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;

class UserCheckoutController extends Controller
{
    public function __construct()
    {
        try {
            $serverKey = config('midtrans.server_key');

            if (empty($serverKey)) {
                throw new Exception('Midtrans server key is not configured. Please check your .env file');
            }

            Config::$serverKey = $serverKey;
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.sanitize');
            Config::$is3ds = config('midtrans.enable_3ds');

            Log::info('Midtrans Configuration Loaded', [
                'isProduction' => Config::$isProduction,
                'isSanitized' => Config::$isSanitized,
                'is3ds' => Config::$is3ds
            ]);
        } catch (Exception $e) {
            Log::error('Midtrans configuration error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function process(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'shipping_address' => ['required', 'string'],
                'notes' => ['nullable', 'string'],
                'cart' => ['required', 'array']
            ]);

            // Log email configuration for debugging
            Log::info('Mail Configuration', [
                'driver' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'username' => config('mail.mailers.smtp.username'),
                'encryption' => config('mail.mailers.smtp.encryption'),
                'from_address' => config('mail.from.address'),
                'from_name' => config('mail.from.name'),
            ]);

            // Hitung total amount untuk keperluan verifikasi nanti
            $totalAmount = 0;
            $items = [];
            $shippingCost = 20000;

            foreach ($request->cart as $item) {
                $totalAmount += ($item['price'] * $item['quantity']);

                $items[] = [
                    'id' => (string) $item['id'],
                    'price' => (int) $item['price'],
                    'quantity' => (int) $item['quantity'],
                    'name' => $item['name']
                ];
            }

            $totalAmount += $shippingCost;

            // Generate temporary order ID untuk tracking
            $tempOrderId = 'TEMP_' . uniqid();

            // Simpan data checkout sementara di cache
            $orderDataCacheKey = 'checkout_data_' . auth()->id() . '_' . $tempOrderId;
            Cache::put($orderDataCacheKey, [
                'customer_details' => [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => auth()->user()->email,
                    'shipping_address' => $request->shipping_address,
                ],
                'items' => $request->cart,
                'shipping_cost' => $shippingCost,
                'total_amount' => $totalAmount,
                'notes' => $request->notes,
            ], now()->addHour()); // Simpan selama 1 jam

            // Generate OTP untuk verifikasi
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Simpan OTP ke cache dengan key yang unik
            $cacheKey = 'checkout_otp_' . auth()->id() . '_' . $tempOrderId;
            Cache::put($cacheKey, $otp, now()->addMinutes(10)); // Expire dalam 10 menit

            // Log OTP for debugging purposes - REMOVE IN PRODUCTION
            Log::info('OTP generated for testing', [
                'user_id' => auth()->id(),
                'email' => auth()->user()->email,
                'temp_order_id' => $tempOrderId,
                'otp' => $otp // REMOVE THIS IN PRODUCTION
            ]);

            // Buat dummy order object untuk keperluan email
            $dummyOrder = new Order();
            $dummyOrder->order_code = $tempOrderId;
            $dummyOrder->total_amount = $totalAmount;
            $dummyOrder->user = auth()->user();

            // Kirim email OTP (hanya sekali)
            try {
                // Hanya kirim email OTP dengan template
                Mail::to(auth()->user()->email)->sendNow(new OtpVerification($otp, $dummyOrder));

                Log::info('OTP Email sent successfully', [
                    'email' => auth()->user()->email
                ]);
            } catch (\Exception $e) {
                // Catat error tapi jangan hentikan proses
                Log::error('Failed to send email: ' . $e->getMessage(), [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString()
                ]);
                // Kita tetap lanjutkan proses meskipun email gagal
            }

            // Log untuk debugging
            Log::info('Payment OTP generated and sent', [
                'temp_order_id' => $tempOrderId,
                'email' => auth()->user()->email
            ]);

            // Return success (OTP disertakan di respons untuk development - HAPUS DI PRODUCTION)
            return response()->json([
                'status' => 'success',
                'message' => 'Kode OTP telah dikirim ke email Anda. Silakan verifikasi untuk melanjutkan pembayaran.',
                'temp_order_id' => $tempOrderId,
                'debug_otp' => app()->environment('local') ? $otp : null // HAPUS INI DI PRODUCTION
            ]);

        } catch (Exception $e) {
            Log::error('Checkout process error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Error processing payment: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Memverifikasi OTP dan membuat order jika valid
     */
    public function verifyOtp(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'temp_order_id' => 'required|string',
                'otp' => 'required|string|size:6',
            ]);

            // Log OTP verification attempt for debugging
            Log::info('OTP verification attempt', [
                'temp_order_id' => $request->temp_order_id,
                'input_otp' => $request->otp,
                'user_id' => auth()->id()
            ]);

            // Cek OTP di cache
            $cacheKey = 'checkout_otp_' . auth()->id() . '_' . $request->temp_order_id;
            $savedOtp = Cache::get($cacheKey);

            Log::info('Saved OTP from cache', [
                'saved_otp' => $savedOtp,
                'cache_key' => $cacheKey
            ]);

            if (!$savedOtp) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Kode OTP tidak valid atau sudah kadaluarsa'
                ], 422);
            }

            if ($savedOtp !== $request->otp) {
                // Increment failed attempts
                $attemptKey = 'checkout_otp_attempts_' . auth()->id() . '_' . $request->temp_order_id;
                $attempts = Cache::get($attemptKey, 0) + 1;
                Cache::put($attemptKey, $attempts, now()->addMinutes(10));

                // After 3 failed attempts, invalidate OTP
                if ($attempts >= 3) {
                    Cache::forget($cacheKey);
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Terlalu banyak percobaan gagal. Silakan request OTP baru.'
                    ], 422);
                }

                return response()->json([
                    'status' => 'error',
                    'message' => 'Kode OTP tidak valid. Sisa percobaan: ' . (3 - $attempts),
                    'attempts_left' => (3 - $attempts)
                ], 422);
            }

            // OTP valid - hapus dari cache
            Cache::forget($cacheKey);
            Cache::forget('checkout_otp_attempts_' . auth()->id() . '_' . $request->temp_order_id);

            // Ambil data checkout dari cache
            $orderDataCacheKey = 'checkout_data_' . auth()->id() . '_' . $request->temp_order_id;
            $orderData = Cache::get($orderDataCacheKey);

            if (!$orderData) {
                throw new Exception('Data checkout tidak ditemukan. Silakan coba lagi.');
            }

            DB::beginTransaction();

            // Setelah OTP terverifikasi, baru buat order di database
            $order = Order::create([
                'user_id' => auth()->id(),
                'shipping_address' => $orderData['customer_details']['shipping_address'],
                'total_amount' => $orderData['total_amount'],
                'status' => 'pending',
                'notes' => $orderData['notes']
            ]);

            // Buat order items
            foreach ($orderData['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            // Persiapkan data untuk Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_code,
                    'gross_amount' => (int) $orderData['total_amount'],
                ],
                'item_details' => array_merge(
                    array_map(function ($item) {
                        return [
                            'id' => (string) $item['id'],
                            'price' => (int) $item['price'],
                            'quantity' => (int) $item['quantity'],
                            'name' => $item['name']
                        ];
                    }, $orderData['items']),
                    [
                        [
                            'id' => 'shipping',
                            'price' => $orderData['shipping_cost'],
                            'quantity' => 1,
                            'name' => 'Shipping Cost'
                        ]
                    ]
                ),
                'customer_details' => [
                    'first_name' => $orderData['customer_details']['name'],
                    'email' => auth()->user()->email,
                    'phone' => $orderData['customer_details']['phone'],
                    'billing_address' => [
                        'address' => $orderData['customer_details']['shipping_address']
                    ],
                    'shipping_address' => [
                        'address' => $orderData['customer_details']['shipping_address']
                    ]
                ],
                'callbacks' => [
                    'finish' => config('midtrans.finish_url', url('/payments/midtrans/success')),
                    'error' => config('midtrans.error_url', url('/orders')),
                    'pending' => config('midtrans.error_url', url('/orders')),
                ]
            ];

            // Generate Snap Token setelah OTP terverifikasi
            $snapToken = Snap::getSnapToken($params);

            if (empty($snapToken)) {
                throw new Exception('Failed to generate Snap Token');
            }

            // Simpan snap token ke database
            $order->update(['snap_token' => $snapToken]);

            // Hapus data checkout dari cache karena sudah tidak diperlukan
            Cache::forget($orderDataCacheKey);

            DB::commit();

            // Log untuk debugging
            Log::info('Payment OTP verified and order created', [
                'order_id' => $order->id,
                'order_code' => $order->order_code,
                'snap_token' => $snapToken
            ]);

            // Return sukses dengan snap token
            return response()->json([
                'status' => 'success',
                'message' => 'Verifikasi berhasil, Anda akan diarahkan ke halaman pembayaran',
                'snap_token' => $snapToken,
                'order_id' => $order->id
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error verifying OTP: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memverifikasi OTP: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Kirim ulang OTP jika expired atau tidak diterima
     */
    public function resendOtp(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'temp_order_id' => 'required|string',
            ]);

            // Cek apakah data checkout ada di cache
            $orderDataCacheKey = 'checkout_data_' . auth()->id() . '_' . $request->temp_order_id;
            $orderData = Cache::get($orderDataCacheKey);

            if (!$orderData) {
                throw new Exception('Data checkout tidak ditemukan. Silakan coba checkout lagi.');
            }

            // Generate OTP baru
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Simpan OTP ke cache dengan key yang unik
            $cacheKey = 'checkout_otp_' . auth()->id() . '_' . $request->temp_order_id;
            Cache::put($cacheKey, $otp, now()->addMinutes(10));

            // Reset counter percobaan
            $attemptKey = 'checkout_otp_attempts_' . auth()->id() . '_' . $request->temp_order_id;
            Cache::forget($attemptKey);

            // Log OTP for debugging - REMOVE IN PRODUCTION
            Log::info('New OTP generated for resend', [
                'user_id' => auth()->id(),
                'email' => auth()->user()->email,
                'temp_order_id' => $request->temp_order_id,
                'otp' => $otp // REMOVE THIS IN PRODUCTION
            ]);

            // Buat dummy order object untuk keperluan email
            $dummyOrder = new Order();
            $dummyOrder->order_code = $request->temp_order_id;
            $dummyOrder->total_amount = $orderData['total_amount'];
            $dummyOrder->user = auth()->user();

            // Coba kirim OTP via email - hanya satu kali
            try {
                Mail::to(auth()->user()->email)->sendNow(new OtpVerification($otp, $dummyOrder));
                Log::info('Resend email sent successfully');
            } catch (\Exception $e) {
                // Catat error tapi jangan hentikan proses
                Log::error('Failed to resend email: ' . $e->getMessage(), [
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]);
                // Kita tetap lanjutkan proses meskipun email gagal
            }

            // Log untuk debugging
            Log::info('Payment OTP resent', [
                'temp_order_id' => $request->temp_order_id,
                'email' => auth()->user()->email
            ]);

            // Return success (OTP disertakan di respons untuk development - HAPUS DI PRODUCTION)
            return response()->json([
                'status' => 'success',
                'message' => 'Kode OTP baru telah dikirim ke email Anda',
                'debug_otp' => app()->environment('local') ? $otp : null // HAPUS INI DI PRODUCTION
            ]);

        } catch (Exception $e) {
            Log::error('Error resending OTP: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengirim ulang kode OTP: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required',
                'transaction_id' => 'required',
                'payment_type' => 'required',
                'status' => 'required|in:paid,pending,cancelled'
            ]);

            $order = Order::findOrFail($request->order_id);

            // Pastikan user hanya bisa update ordernya sendiri
            if ($order->user_id !== auth()->id()) {
                throw new Exception('Unauthorized access');
            }

            $order->update([
                'status' => $request->status,
                'midtrans_transaction_id' => $request->transaction_id,
                'midtrans_payment_type' => $request->payment_type
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Order status updated successfully'
            ]);

        } catch (Exception $e) {
            Log::error('Error updating order status: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Test route for email testing
     */
    public function testEmail()
    {
        try {
            $email = auth()->user()->email;
            $testMessage = 'Ini adalah email test dari aplikasi pada ' . now()->format('Y-m-d H:i:s');

            Log::info('Attempting to send test email', [
                'to' => $email,
                'message' => $testMessage
            ]);

            Mail::raw($testMessage, function ($message) use ($email) {
                $message->to($email)
                    ->subject('Test Email dari Aplikasi');
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Test email berhasil dikirim ke ' . $email,
                'time' => now()->format('Y-m-d H:i:s')
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengirim email: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
}