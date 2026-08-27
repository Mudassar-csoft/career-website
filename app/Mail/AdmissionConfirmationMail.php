<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdmissionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Subscriber $subscriber,
        public ?string $course,
    ) {}

    public function envelope(): Envelope
    {
        $admissionsAddress = config('lead-recipients.addresses.admissions', 'admissions@career.edu.pk');

        return new Envelope(
            from: new Address($admissionsAddress, 'Career Institute Admissions'),
            replyTo: [new Address($admissionsAddress, 'Career Institute Admissions')],
            subject: 'Start Your Learning Journey with Career Institute',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.admission-confirmation');
    }
}
