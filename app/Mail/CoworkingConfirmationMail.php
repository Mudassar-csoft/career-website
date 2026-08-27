<?php

namespace App\Mail;

use App\Models\CoworkingInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoworkingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public CoworkingInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        $coworkingAddress = config('lead-recipients.addresses.coworking', 'coworking@career.edu.pk');

        return new Envelope(
            from: new Address($coworkingAddress, 'Career Institute Coworking'),
            replyTo: [new Address($coworkingAddress, 'Career Institute Coworking')],
            subject: 'Thank You for Your Coworking Interest',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.coworking-confirmation');
    }
}
