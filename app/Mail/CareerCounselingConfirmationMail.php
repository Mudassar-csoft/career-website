<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CareerCounselingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Subscriber $subscriber) {}

    public function envelope(): Envelope
    {
        $infoAddress = config(
            'lead-recipients.addresses.info',
            config('lead-recipients.default', 'info@career.edu.pk'),
        );

        return new Envelope(
            from: new Address($infoAddress, 'Career Institute'),
            replyTo: [new Address($infoAddress, 'Career Institute')],
            subject: 'Thank You for Contacting Career Institute',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.career-counseling-confirmation');
    }
}
