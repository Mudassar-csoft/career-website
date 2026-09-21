<?php

namespace Tests\Feature;

use App\Mail\LeadNotificationMail;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EnquiryDetailsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admission_city_is_forwarded_to_ims_and_details_are_saved_and_emailed(): void
    {
        Http::fake(['*' => Http::response([], 200)]);
        Mail::fake();

        $this->postJson(route('subscribers.store'), [
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'phone' => '03140000000',
            'course' => 'Web Development',
            'city' => 'Lahore',
            'message' => 'Please share the evening class schedule.',
            'source' => 'Online Admission Modal',
            'lead_type' => 'admission',
        ])->assertOk();

        Http::assertSent(fn ($request) => $request['city'] === 'Lahore' && $request['type'] === 'Admission');
        $this->assertDatabaseHas('subscribers', [
            'email' => 'student@example.com',
            'city' => 'Lahore',
            'message' => 'Please share the evening class schedule.',
        ]);
        Mail::assertSent(LeadNotificationMail::class, function ($mail) {
            $mail->assertSeeInHtml('Lahore');
            $mail->assertSeeInHtml('Please share the evening class schedule.');

            return $mail->hasTo(config('lead-recipients.addresses.admissions'));
        });
    }

    public function test_job_application_saves_details_and_privately_stores_and_attaches_the_document(): void
    {
        Mail::fake();
        Storage::fake('local');
        Storage::fake('public');

        $this->post(route('subscribers.store'), [
            'name' => 'Test Applicant',
            'email' => 'applicant@example.com',
            'phone' => '03140000000',
            'linkedin_url' => 'https://www.linkedin.com/in/test-applicant',
            'institution' => 'Test University',
            'city' => 'Karachi',
            'qualification' => 'BS Computer Science',
            'source' => 'Job Placement',
            'document' => UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf'),
        ], ['Accept' => 'application/json'])->assertOk();

        $subscriber = Subscriber::where('email', 'applicant@example.com')->firstOrFail();
        $this->assertSame('resume.pdf', $subscriber->document_name);
        Storage::disk('local')->assertExists($subscriber->document_path);
        Storage::disk('public')->assertMissing($subscriber->document_path);
        $this->assertDatabaseHas('subscribers', [
            'id' => $subscriber->id,
            'linkedin_url' => 'https://www.linkedin.com/in/test-applicant',
            'institution' => 'Test University',
            'city' => 'Karachi',
            'qualification' => 'BS Computer Science',
        ]);
        Mail::assertSent(LeadNotificationMail::class, function ($mail) use ($subscriber) {
            $mail->assertSeeInHtml('Karachi');
            $mail->assertSeeInHtml('Test University');
            $mail->assertSeeInHtml('BS Computer Science');
            $mail->assertHasAttachmentFromStorageDisk('local', $subscriber->document_path, 'resume.pdf');

            return $mail->hasTo(config('lead-recipients.sources.job placement'));
        });
    }

    public function test_invalid_or_oversized_documents_are_rejected_before_saving_or_notifying(): void
    {
        Mail::fake();
        Storage::fake('local');

        foreach ([
            UploadedFile::fake()->create('resume.exe', 100, 'application/x-msdownload'),
            UploadedFile::fake()->create('resume.pdf', 5121, 'application/pdf'),
        ] as $document) {
            $this->post(route('subscribers.store'), [
                'email' => 'applicant@example.com',
                'source' => 'Job Placement',
                'document' => $document,
            ], ['Accept' => 'application/json'])
                ->assertUnprocessable()
                ->assertJsonValidationErrors('document');
        }

        $this->assertDatabaseCount('subscribers', 0);
        $this->assertSame([], Storage::disk('local')->allFiles());
        Mail::assertNothingSent();
    }

    public function test_later_enquiries_do_not_email_previously_uploaded_documents_or_details(): void
    {
        Mail::fake();
        Subscriber::create([
            'email' => 'applicant@example.com',
            'source' => 'Job Placement',
            'city' => 'Karachi',
            'qualification' => 'BS Computer Science',
            'document_path' => 'job-placement-documents/previous.pdf',
            'document_name' => 'previous.pdf',
        ]);

        $this->postJson(route('subscribers.store'), [
            'email' => 'applicant@example.com',
            'source' => 'Newsletter - Home',
        ])->assertOk();

        Mail::assertSent(LeadNotificationMail::class, function ($mail) {
            $this->assertSame([], $mail->attachments());
            $mail->assertDontSeeInHtml('BS Computer Science');
            $mail->assertDontSeeInHtml('Karachi');

            return true;
        });
    }
}
