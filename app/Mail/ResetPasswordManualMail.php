<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordManualMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        $resetLink = url("/reset-password/{$this->token}?email=" . urlencode($this->user->email));

        return $this->subject('Reset Password Akun ITSA Dinkominfo')
            ->html("
                <p>Halo <strong>{$this->user->name}</strong>,</p>
                <p>Kami menerima permintaan untuk reset password akun Anda.</p>
                <p>Klik link berikut untuk mengganti password:</p>
                <p><a href=\"{$resetLink}\">Reset Password</a></p>
                <p>Jika Anda tidak meminta ini, abaikan saja email ini.</p>
                <p>Terima kasih.</p>
            ");
    }
}
