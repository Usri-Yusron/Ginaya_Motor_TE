<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserLandingController;
use App\Http\Controllers\User\UserCheckoutController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Verification Routes
|--------------------------------------------------------------------------
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Menandai email sebagai verified

    return redirect()->route('home'); // atau 'dashboard'
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Link verifikasi sudah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Public Routes (No Authentication Required)
|--------------------------------------------------------------------------
*/
Route::get('/', [UserLandingController::class, 'index'])->name('home');
Route::get('/cart', [UserCartController::class, 'index'])->name('cart');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
});

Route::post('/auth/logout', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');

// Midtrans callback (no auth & CSRF)
Route::post('/payments/midtrans-callback', [UserCheckoutController::class, 'callback'])
    ->name('midtrans.callback')
    ->middleware('web:false');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Regular User Routes
    Route::get('/orders', [UserOrderController::class, 'index'])->name('user.orders');

    // Checkout Routes
    Route::post('/checkout/process', [UserCheckoutController::class, 'process'])
        ->name('checkout.process');
    Route::post('/payments/update-status', [UserCheckoutController::class, 'updateStatus'])
        ->name('payment.update-status');

    // OTP verification routes
    Route::post('/payments/verify-otp', [UserCheckoutController::class, 'verifyOtp'])
        ->name('payments.verify-otp');

    // Kirim ulang OTP
    Route::post('/payments/resend-otp', [UserCheckoutController::class, 'resendOtp'])
        ->name('payments.resend-otp');

    // Route testing untuk email
    Route::get('/test-email', [UserCheckoutController::class, 'testEmail'])
        ->name('test.email');

    // Route untuk debug OTP dari cache (FOR DEVELOPMENT ONLY - REMOVE IN PRODUCTION)
    Route::get('/debug/otp/{temp_order_id}', function ($temp_order_id) {
        if (!app()->environment('local')) {
            abort(404);
        }

        $userId = auth()->id();
        $cacheKey = 'checkout_otp_' . $userId . '_' . $temp_order_id;
        $otp = Cache::get($cacheKey);

        return [
            'temp_order_id' => $temp_order_id,
            'user_id' => $userId,
            'otp' => $otp,
            'cache_key' => $cacheKey
        ];
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Categories Management
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('admin.categories.index');
        Route::post('/', [CategoryController::class, 'store'])
            ->name('admin.categories.store');
        Route::put('/{category}', [CategoryController::class, 'update'])
            ->name('admin.categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])
            ->name('admin.categories.destroy');
    });

    // Products Management
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])
            ->name('admin.products.index');
        Route::post('/', [ProductController::class, 'store'])
            ->name('admin.products.store');
        Route::put('/{product}', [ProductController::class, 'update'])
            ->name('admin.products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])
            ->name('admin.products.destroy');
    });

    // Users Management
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])
            ->name('admin.users.index');
        Route::delete('/{user}', [UserController::class, 'destroy'])
            ->name('admin.users.destroy');
    });

    // Orders Management
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrdersController::class, 'index'])
            ->name('admin.orders.index');
        Route::patch('/{order}/status', [OrdersController::class, 'updateStatus'])
            ->name('admin.orders.update-status');
    });

    // Order History
    Route::get('/history-order', [OrderHistoryController::class, 'index'])
        ->name('admin.history.index');
});
