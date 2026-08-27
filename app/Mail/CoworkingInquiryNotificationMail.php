<?php

namespace App\Mail;

use App\Models\CoworkingInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoworkingInquiryNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public CoworkingInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New coworking inquiry: '.$this->inquiry->interested_in,
            replyTo: [new Address($this->inquiry->email, $this->inquiry->name)],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.coworking-inquiry-notification');
    }
}
