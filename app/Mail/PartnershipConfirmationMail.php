<?php

namespace App\Mail;

use App\Models\PartnerInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PartnershipConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public PartnerInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        $partnersAddress = config('lead-recipients.addresses.partners', 'partners@career.edu.pk');

        return new Envelope(
            from: new Address($partnersAddress, 'Career Institute Partners'),
            replyTo: [new Address($partnersAddress, 'Career Institute Partners')],
            subject: 'Thank You for Your Partnership Interest',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.partnership-confirmation');
    }
}
