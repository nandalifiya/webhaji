<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nandaalifiya2@gmail.com', 'WEBHAJI ONLINE')
        ->subject('Konfirmasi Pembayaran Pesanan - WEBHAJI')
        ->markdown('mails.verification')
        ->with([
            'name' => 'Kamu',
            'link' => '127.0.0.1:8000'
        ]);
    }
}
