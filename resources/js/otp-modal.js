// Komponen Modal OTP untuk digunakan di cart.js

class OtpModal {
    constructor() {
        this.modal = null;
        this.tempOrderId = null;
        this.onSuccess = null;
    }

    // Method utama untuk menampilkan modal OTP
    show(tempOrderId, onSuccess) {
        this.tempOrderId = tempOrderId;
        this.onSuccess = onSuccess;

        // Buat elemen modal
        this.createModal();

        // Tampilkan modal
        setTimeout(() => {
            this.modal.classList.remove('opacity-0');
            this.modal.querySelector('.modal-container').classList.remove('translate-y-10');
        }, 50);

        // Attach event listeners
        this.attachEventListeners();
    }

    // Buat struktur HTML modal
    createModal() {
        // Hapus modal yang mungkin sudah ada
        const existingModal = document.getElementById('otpModal');
        if (existingModal) {
            existingModal.remove();
        }

        // Buat elemen modal baru
        this.modal = document.createElement('div');
        this.modal.id = 'otpModal';
        this.modal.className = 'fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 opacity-0 transition-opacity duration-300';

        this.modal.innerHTML = `
            <div class="modal-container bg-white rounded-xl shadow-lg transform transition-transform duration-300 translate-y-10 max-w-md w-full p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Verifikasi OTP</h3>
                    <button type="button" class="close-btn text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="mb-4">
                    <p class="text-sm text-gray-600">
                        Kode OTP telah dikirim ke email Anda. Silakan masukkan kode tersebut untuk melanjutkan pembayaran.
                    </p>
                </div>
                
                <div class="mb-6">
                    <div class="flex justify-center mb-4">
                        <div class="flex space-x-2">
                            <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-xl font-bold bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500" inputmode="numeric">
                            <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-xl font-bold bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500" inputmode="numeric">
                            <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-xl font-bold bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500" inputmode="numeric">
                            <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-xl font-bold bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500" inputmode="numeric">
                            <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-xl font-bold bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500" inputmode="numeric">
                            <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-xl font-bold bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500" inputmode="numeric">
                        </div>
                    </div>
                    <p id="otpError" class="text-xs text-red-600 text-center hidden"></p>
                </div>
                
                <div class="flex flex-col gap-3">
                    <button type="button" id="verifyOtpBtn" class="w-full px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors">
                        Verifikasi
                    </button>
                    
                    <div class="flex items-center justify-center text-sm">
                        <p class="text-gray-600">Tidak menerima kode?</p>
                        <button type="button" id="resendOtpBtn" class="text-orange-600 hover:text-orange-700 ml-1">
                            Kirim Ulang
                        </button>
                    </div>
                    
                    <p id="countdown" class="text-xs text-gray-500 text-center mt-1">
                        Mengirim ulang tersedia dalam <span id="timer">60</span> detik
                    </p>
                </div>
            </div>
        `;

        document.body.appendChild(this.modal);

        // Auto-focus pada input pertama
        setTimeout(() => {
            const firstInput = this.modal.querySelector('.otp-input');
            if (firstInput) firstInput.focus();
        }, 100);
    }

    // Attach event listeners
    attachEventListeners() {
        // Close button
        const closeBtn = this.modal.querySelector('.close-btn');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => this.hide());
        }

        // Outside click
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.hide();
            }
        });

        // OTP input handling
        const inputs = this.modal.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            // Handle pasting OTP
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text').trim();
                if (/^\d+$/.test(pasteData)) {
                    for (let i = 0; i < Math.min(pasteData.length, inputs.length); i++) {
                        inputs[i].value = pasteData[i];
                        if (i < inputs.length - 1) {
                            inputs[i + 1].focus();
                        }
                    }
                }
            });

            // Handle input
            input.addEventListener('input', (e) => {
                // Allow only numbers
                e.target.value = e.target.value.replace(/[^0-9]/g, '');

                // Auto-focus next input
                if (e.target.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            // Handle backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        // Verify button
        const verifyBtn = this.modal.querySelector('#verifyOtpBtn');
        if (verifyBtn) {
            verifyBtn.addEventListener('click', () => this.verifyOtp());
        }

        // Resend button
        const resendBtn = this.modal.querySelector('#resendOtpBtn');
        if (resendBtn) {
            resendBtn.disabled = true;
            resendBtn.classList.add('text-gray-400', 'cursor-not-allowed');

            // Start countdown
            this.startCountdown(() => {
                resendBtn.disabled = false;
                resendBtn.classList.remove('text-gray-400', 'cursor-not-allowed');
                document.getElementById('countdown').classList.add('hidden');
            });

            resendBtn.addEventListener('click', () => {
                if (!resendBtn.disabled) {
                    this.resendOtp();
                    resendBtn.disabled = true;
                    resendBtn.classList.add('text-gray-400', 'cursor-not-allowed');
                    document.getElementById('countdown').classList.remove('hidden');
                    this.startCountdown(() => {
                        resendBtn.disabled = false;
                        resendBtn.classList.remove('text-gray-400', 'cursor-not-allowed');
                        document.getElementById('countdown').classList.add('hidden');
                    });
                }
            });
        }
    }

    // Countdown timer for resend button
    startCountdown(callback) {
        const timerElement = document.getElementById('timer');
        let seconds = 60;

        timerElement.textContent = seconds;

        const interval = setInterval(() => {
            seconds--;
            if (timerElement) timerElement.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(interval);
                if (callback) callback();
            }
        }, 1000);

        // Save interval ID to clear it when modal is closed
        this.countdownInterval = interval;
    }

    // Hide modal
    hide() {
        if (this.modal) {
            this.modal.classList.add('opacity-0');
            this.modal.querySelector('.modal-container').classList.add('translate-y-10');

            // Clear countdown interval
            if (this.countdownInterval) {
                clearInterval(this.countdownInterval);
            }

            setTimeout(() => {
                this.modal.remove();
                this.modal = null;
            }, 300);
        }
    }

    // Get OTP value
    getOtpValue() {
        const inputs = this.modal.querySelectorAll('.otp-input');
        return Array.from(inputs).map(input => input.value).join('');
    }

    // Verify OTP
    async verifyOtp() {
        const otp = this.getOtpValue();

        // Validate OTP
        if (!otp || otp.length !== 6 || !/^\d{6}$/.test(otp)) {
            const errorElement = document.getElementById('otpError');
            errorElement.textContent = 'Masukkan 6 digit kode OTP yang valid';
            errorElement.classList.remove('hidden');
            return;
        }

        // Disable verify button
        const verifyBtn = document.getElementById('verifyOtpBtn');
        if (verifyBtn) {
            verifyBtn.disabled = true;
            verifyBtn.textContent = 'Memverifikasi...';
            verifyBtn.classList.add('opacity-75');
        }

        try {
            const response = await fetch('/payments/verify-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({
                    temp_order_id: this.tempOrderId,
                    otp: otp
                })
            });

            const data = await response.json();

            if (!response.ok || data.status === 'error') {
                throw new Error(data.message || 'Gagal memverifikasi OTP');
            }

            // Hide modal
            this.hide();

            // Call success callback with snap token
            if (this.onSuccess) {
                this.onSuccess(data.snap_token, data.order_id);
            }

        } catch (error) {
            const errorElement = document.getElementById('otpError');
            errorElement.textContent = error.message;
            errorElement.classList.remove('hidden');

            // Enable verify button
            if (verifyBtn) {
                verifyBtn.disabled = false;
                verifyBtn.textContent = 'Verifikasi';
                verifyBtn.classList.remove('opacity-75');
            }
        }
    }

    // Resend OTP
    async resendOtp() {
        try {
            const response = await fetch('/payments/resend-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({
                    temp_order_id: this.tempOrderId
                })
            });

            const data = await response.json();

            if (!response.ok || data.status === 'error') {
                throw new Error(data.message || 'Gagal mengirim ulang OTP');
            }

            // Clear OTP inputs
            const inputs = this.modal.querySelectorAll('.otp-input');
            inputs.forEach(input => {
                input.value = '';
            });

            // Focus first input
            if (inputs.length > 0) {
                inputs[0].focus();
            }

            // Show success message
            const errorElement = document.getElementById('otpError');
            errorElement.textContent = 'Kode OTP baru telah dikirim ke email Anda';
            errorElement.classList.remove('hidden', 'text-red-600');
            errorElement.classList.add('text-green-600');

            // Hide error after 3 seconds
            setTimeout(() => {
                errorElement.classList.add('hidden');
            }, 3000);

        } catch (error) {
            const errorElement = document.getElementById('otpError');
            errorElement.textContent = error.message;
            errorElement.classList.remove('hidden', 'text-green-600');
            errorElement.classList.add('text-red-600');
        }
    }
}

export default OtpModal;