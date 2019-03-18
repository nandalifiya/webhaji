<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OutboxMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $description;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $description)
    {
        //
        $this->subject = $subject;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('do_not_reply@webhaji.com', 'WEBHAJI ONLINE')
      ->subject($this->subject)
      ->markdown('mails.outboxMail')
      ->with([
        'name' => 'Kamu',
        'description' => $this->description
      ]);
    }
}
