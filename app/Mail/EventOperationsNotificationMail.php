<?php

namespace App\Mail;

use App\Models\EventRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventOperationsNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public EventRegistration $registration,
        public string $notificationType,
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->notificationType === 'payment receipt'
            ? 'Payment receipt submitted: '
            : 'New event registration: ';

        return new Envelope(
            subject: $subject.$this->registration->event->title,
            replyTo: new Address($this->registration->email, $this->registration->name),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.event-operations-notification',
            with: [
                'event' => $this->registration->event,
                'registration' => $this->registration,
                'notificationType' => $this->notificationType,
            ],
        );
    }
}
