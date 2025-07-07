<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Akun Anda Ditolak oleh ITSA Dinkominfo')
            ->html("
                <p>Halo <strong>{$this->user->name}</strong>,</p>
                <p>Mohon maaf, akun Anda telah <strong>ditolak</strong> oleh <strong>ITSA Dinkominfo</strong>.</p>
                <p>Silakan hubungi admin jika membutuhkan bantuan atau informasi lebih lanjut.</p>
            ");
    }
}
