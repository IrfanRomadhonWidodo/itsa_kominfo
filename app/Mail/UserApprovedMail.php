<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Akun Anda Disetujui oleh ITSA Dinkominfo')
            ->html("
                <p>Halo <strong>{$this->user->name}</strong>,</p>
                <p>Akun Anda telah <strong>disetujui</strong> oleh <strong>ITSA Dinkominfo</strong>.</p>
                <p>Silakan login untuk mulai menggunakan layanan kami.</p>
                <p>Terima kasih.</p>
            ");
    }
}

