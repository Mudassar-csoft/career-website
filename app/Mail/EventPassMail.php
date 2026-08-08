<?php

namespace App\Mail;

use App\Models\EventRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventPassMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public EventRegistration $registration,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Pass for '.$this->registration->event->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.event-pass',
            with: [
                'registration' => $this->registration,
                'event' => $this->registration->event,
            ],
        );
    }
}
