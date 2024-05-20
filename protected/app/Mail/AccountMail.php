<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $applicant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $applicant)
    {
        $this->data = $data;
        $this->applicant = $applicant;
    }

    public function build()
    {
        return $this->subject('Merchant Account Information')
                    ->view('emails.account');
    }
}
