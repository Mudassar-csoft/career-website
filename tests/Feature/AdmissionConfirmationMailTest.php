<?php

namespace Tests\Feature;

use App\Mail\AdmissionConfirmationMail;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdmissionConfirmationMailTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_uses_the_admissions_mailbox_for_admission_confirmations(): void
    {
        $mail = new AdmissionConfirmationMail(new Subscriber([
            'name' => 'Test Student',
            'email' => 'student@example.com',
        ]), 'Web Development Certification');

        $envelope = $mail->envelope();

        $this->assertSame('admissions@career.edu.pk', $envelope->from->address);
        $this->assertSame('admissions@career.edu.pk', $envelope->replyTo[0]->address);
        $this->assertSame('Start Your Learning Journey with Career Institute', $envelope->subject);
    }

    public function test_it_sends_the_admission_confirmation_for_all_admission_related_forms(): void
    {
        Http::fake(['*' => Http::response([], 200)]);
        Mail::fake();

        foreach (['admission', 'brochure_lead', 'website_enrollment'] as $index => $leadType) {
            $response = $this->postJson(route('subscribers.store'), [
                'name' => 'Test Student',
                'email' => "student{$index}@example.com",
                'phone' => "0314000000{$index}",
                'course' => 'Web Development Certification',
                'lead_type' => $leadType,
            ]);

            $response->assertOk();
        }

        Mail::assertSent(AdmissionConfirmationMail::class, 3);
    }
}
