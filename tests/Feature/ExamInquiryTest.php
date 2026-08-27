<?php

namespace Tests\Feature;

use App\Mail\ExamInquiryNotificationMail;
use App\Mail\ExamSchedulingConfirmationMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ExamInquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_an_exam_request_and_sends_both_exam_emails(): void
    {
        Mail::fake();

        $response = $this->postJson(route('exam-inquiries.store'), [
            'exam_provider' => 'PSI',
            'exam_title' => 'Project Management Professional',
            'exam_code' => 'PMP-001',
            'name' => 'Exam Candidate',
            'email' => 'candidate@example.com',
            'city' => 'Faisalabad',
            'preferred_date' => '2026-09-10',
            'message' => 'Morning appointment preferred.',
        ]);

        $response->assertOk()->assertJsonPath('message', 'Thank you. Your exam scheduling request has been received.');
        $this->assertDatabaseHas('exam_inquiries', [
            'exam_provider' => 'PSI',
            'exam_title' => 'Project Management Professional',
            'email' => 'candidate@example.com',
        ]);
        Mail::assertSent(ExamInquiryNotificationMail::class);
        Mail::assertSent(ExamSchedulingConfirmationMail::class, function (ExamSchedulingConfirmationMail $mail) {
            return $mail->envelope()->from->address === 'exams@career.edu.pk'
                && $mail->envelope()->subject === 'Thank You for Scheduling Your Exam';
        });
    }
}
