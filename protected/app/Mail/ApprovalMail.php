<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApprovalMail extends Mailable
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
        switch ($this->applicant->internal_status) {
            case 'New Request':
                return $this->subject('Merchant Approval Information')
                            ->view('emails.approvals.new');
                break;
            case 'Verification':
                return $this->subject('Merchant Approval Information')
                            ->view('emails.approvals.process');
                break;
            case 'Validation':
                return $this->subject('Merchant Approval Information')
                            ->view('emails.approvals.process');
                break;
            case 'Reject':
                return $this->subject('Merchant Approval Information')
                            ->view('emails.approvals.reject');
                break;
            case 'Close':
                return $this->subject('Merchant Approval Information')
                            ->view('emails.approvals.close');
                break;
            case 'Approve':
                return $this->subject('Merchant Approval Information')
                            ->view('emails.approvals.approve');
                break;
            default:
            return $this->subject('Merchant Approval Information')
                        ->view('emails.approvals.new');
                break;
        }
    }
}
