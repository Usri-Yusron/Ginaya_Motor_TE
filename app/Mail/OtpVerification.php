<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpVerification extends Mailable
{
    use SerializesModels;

    public $otp;
    public $order;
    public $expiresIn;

    /**
     * Create a new message instance.
     *
     * @param string $otp
     * @param Order $order
     * @return void
     */
    public function __construct(string $otp, Order $order)
    {
        $this->otp = $otp;
        $this->order = $order;
        $this->expiresIn = '10 menit';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kode OTP untuk Pembayaran #' . $this->order->order_code)
            ->markdown('emails.otp-verification')
            ->with([
                'otp' => $this->otp,
                'order' => $this->order,
                'expiresIn' => $this->expiresIn
            ]);
    }
}