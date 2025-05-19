@extends('layouts.layouts-landing')

@section('title', 'Shopping Cart')

@section('content')
    @auth
        <div id="userData" data-name="{{ auth()->user()->name }}" data-phone="{{ auth()->user()->phone }}"
            data-address="{{ auth()->user()->address }}" class="hidden">
        </div>
    @endauth

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Notifications --}}
            @if (session('warning'))
                <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                    Please login first to proceed with checkout
                </div>
            @endif

            <div class="flex items-center justify-between mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Shopping Cart</h1>
                <a href="/" class="text-orange-600 hover:text-orange-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items Container -->
                <div class="flex-1">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden cart-items"
                        data-logged-in="{{ auth()->check() ? 'true' : 'false' }}">
                        <!-- Cart items will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="w-full lg:w-96">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-medium text-gray-900">Order Summary</h2>
                        <dl class="mt-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-gray-600">Subtotal</dt>
                                <dd class="text-sm font-medium text-gray-900" data-summary="subtotal">Rp 0</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-gray-600">Shipping</dt>
                                <dd class="text-sm font-medium text-gray-900" data-summary="shipping">Rp 0</dd>
                            </div>
                            <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt class="text-base font-medium text-gray-900">Total</dt>
                                <dd class="text-base font-medium text-gray-900" data-summary="total">Rp 0</dd>
                            </div>
                        </dl>

                        @if (auth()->check())
                            <button data-action="checkout"
                                class="mt-6 w-full bg-gray-300 cursor-not-allowed text-white py-3 px-4 rounded-lg">
                                Proceed to Checkout
                            </button>
                            <button id="payButton"
                                class="mt-6 w-full bg-orange-600 hover:bg-orange-700 text-white py-3 px-4 rounded-lg hidden">
                                Pay Now
                            </button>
                        @else
                            <a href="{{ route('login') }}"
                                class="mt-6 w-full bg-orange-600 hover:bg-orange-700 text-white py-3 px-4 rounded-lg text-center block">
                                Login to Checkout
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ config('midtrans.payment_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
