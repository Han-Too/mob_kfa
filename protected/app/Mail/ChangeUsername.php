<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChangeUsername extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $merchant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($merchant)
    {
        // $this->data = $data;
        $this->merchant = $merchant;
    }

    public function build()
    {
        return $this->subject('Merchant Account Information')
                    ->view('emails.username');
    }
}
