<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscriptionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Subscriber $subscriber) {}

    public function envelope(): Envelope
    {
        $newsletterAddress = config('lead-recipients.addresses.newsletters', 'newsletters@career.edu.pk');

        return new Envelope(
            from: new Address($newsletterAddress, 'Career Institute Newsletter'),
            replyTo: [new Address($newsletterAddress, 'Career Institute Newsletter')],
            subject: 'Welcome to Career Institute Newsletter',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.newsletter-subscription-confirmation');
    }
}
