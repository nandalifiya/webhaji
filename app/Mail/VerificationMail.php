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
        return $this->from('do_not_reply@webhaji.com', 'WEBHAJI ONLINE')
        ->subject('Konfirmasi Pembayaran Pesanan - WEBHAJI')
        ->markdown('mails.verification')
        ->with([
            'name' => 'Kamu',
            'link' => 'localhost:8000'
        ]);
    }
}
