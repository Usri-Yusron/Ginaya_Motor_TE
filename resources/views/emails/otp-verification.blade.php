<!-- resources/views/emails/otp-verification.blade.php -->
@component('mail::message')
# Kode OTP untuk Pembayaran

Halo {{ $order->user->name }},

Terima kasih telah melakukan pemesanan di toko kami. Untuk melanjutkan ke proses pembayaran, silakan masukkan kode OTP berikut:

@component('mail::panel')
<div style="text-align: center; font-size: 24px; font-weight: bold; letter-spacing: 5px;">
{{ $otp }}
</div>
@endcomponent

Detail Pesanan:
- Nomor Pesanan: **{{ $order->order_code }}**
- Total Pembayaran: **Rp {{ number_format($order->total_amount, 0, ',', '.') }}**

Kode OTP ini akan kadaluarsa dalam {{ $expiresIn }}.

Jika Anda tidak merasa melakukan pemesanan ini, silakan abaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}

<small>Email ini dibuat secara otomatis, mohon tidak membalas email ini.</small>
@endcomponent