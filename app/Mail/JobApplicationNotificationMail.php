<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public JobApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New job application: '.($this->application->job_title ?: 'General CV submission'),
            replyTo: [new Address($this->application->email, $this->application->name)],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.job-application-notification');
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('local', $this->application->document_path)
                ->as($this->application->document_name),
        ];
    }
}
