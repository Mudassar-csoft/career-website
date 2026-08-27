<?php

namespace App\Mail;

use App\Models\ExamInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExamSchedulingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ExamInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        $examsAddress = config('lead-recipients.addresses.exams', 'exams@career.edu.pk');

        return new Envelope(
            from: new Address($examsAddress, 'Career Institute Exam Center'),
            replyTo: [new Address($examsAddress, 'Career Institute Exam Center')],
            subject: 'Thank You for Scheduling Your Exam',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.exam-scheduling-confirmation');
    }
}
