<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Subscriber $subscriber) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New website enquiry: '.($this->subscriber->source ?: 'General enquiry'),
            replyTo: $this->subscriber->email
                ? new Address($this->subscriber->email, $this->subscriber->name ?: $this->subscriber->email)
                : null,
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.lead-notification');
    }
}
