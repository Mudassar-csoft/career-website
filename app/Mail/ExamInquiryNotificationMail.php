<?php

namespace App\Mail;

use App\Models\ExamInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExamInquiryNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ExamInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New exam scheduling request: '.$this->inquiry->exam_title,
            replyTo: [new Address($this->inquiry->email, $this->inquiry->name)],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.exam-inquiry-notification');
    }
}
