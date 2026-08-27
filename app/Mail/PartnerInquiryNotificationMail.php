<?php

namespace App\Mail;

use App\Models\PartnerInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PartnerInquiryNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public PartnerInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New partnership inquiry: '.$this->inquiry->business_interest,
            replyTo: [new Address($this->inquiry->email, $this->inquiry->name)],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.partner-inquiry-notification');
    }
}
