<?php

namespace Tests\Feature;

use App\Mail\JobApplicationNotificationMail;
use App\Models\JobApplication;
use App\Models\JobOffer;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Subscriber;
use App\Models\User;
use App\Providers\PermissionServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class JobApplicationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
        Storage::fake('local');
        Storage::fake('public');
        Permission::create([
            'slug' => 'job-offers.view', 'module' => 'job-offers',
            'action' => 'view', 'name' => 'View Job Offers',
        ]);
        $this->app->getProvider(PermissionServiceProvider::class)->boot();
    }

    public function test_an_application_is_saved_for_the_selected_job_with_a_private_cv_and_notification(): void
    {
        $job = $this->job();

        $this->postJson(route('job-applications.store'), $this->applicant($job))
            ->assertCreated()
            ->assertJsonPath('message', 'Thank you. Your application for '.$job->title.' has been received.');

        $application = JobApplication::firstOrFail();
        $this->assertSame($job->id, $application->job_offer_id);
        $this->assertSame($job->title, $application->job_title);
        $this->assertSame('resume.pdf', $application->document_name);
        Storage::disk('local')->assertExists($application->document_path);
        Storage::disk('public')->assertMissing($application->document_path);
        $this->assertDatabaseHas('job_applications', [
            'email' => 'applicant@example.com', 'city' => 'Faisalabad',
            'institution' => 'Test University', 'qualification' => 'BS Computer Science',
        ]);
        Mail::assertSent(JobApplicationNotificationMail::class, function ($mail) use ($application) {
            $mail->assertSeeInHtml($application->job_title);
            $mail->assertSeeInHtml(route('dashboard.job-applications.show', $application));
            $mail->assertHasAttachment(
                Attachment::fromStorageDisk('local', $application->document_path)->as('resume.pdf')
            );

            return $mail->hasTo(config('lead-recipients.sources.job placement'));
        });
    }

    public function test_the_same_applicant_can_apply_for_multiple_jobs_without_overwriting_previous_cvs(): void
    {
        $firstJob = $this->job();
        $secondJob = $this->job(['title' => 'Digital Marketing Instructor']);

        $this->postJson(route('job-applications.store'), $this->applicant($firstJob))->assertCreated();
        $this->postJson(route('job-applications.store'), $this->applicant($secondJob))->assertCreated();

        $this->assertDatabaseCount('job_applications', 2);
        $applications = JobApplication::orderBy('id')->get();
        $this->assertSame([$firstJob->id, $secondJob->id], $applications->pluck('job_offer_id')->all());
        $this->assertNotSame($applications[0]->document_path, $applications[1]->document_path);
        foreach ($applications as $application) {
            Storage::disk('local')->assertExists($application->document_path);
        }
    }

    public function test_a_general_cv_can_be_submitted_without_selecting_a_job(): void
    {
        $this->postJson(route('job-applications.store'), $this->applicant())
            ->assertCreated()
            ->assertJsonPath('message', 'Thank you. Your CV has been received for future job opportunities.');

        $this->assertNull(JobApplication::firstOrFail()->job_offer_id);
        $this->assertNull(JobApplication::firstOrFail()->job_title);
    }

    public function test_applying_without_javascript_redirects_back_to_the_form_with_confirmation(): void
    {
        $job = $this->job();

        $this->post(route('job-applications.store'), $this->applicant($job))
            ->assertRedirect(route('job-placement', ['job' => $job->id]).'#job-placement-form')
            ->assertSessionHas('status');
    }

    public function test_apply_links_select_the_job_even_when_it_is_not_in_the_filtered_results(): void
    {
        $job = $this->job();
        $otherJob = $this->job(['title' => 'Digital Marketing Instructor']);

        $this->get(route('job-placement'))
            ->assertOk()
            ->assertSee(route('job-placement', ['job' => $job->id]).'#job-placement-form', false)
            ->assertSee(route('job-applications.store'), false)
            ->assertDontSee('Apply Unavailable');

        $this->get(route('job-placement', ['search' => 'Digital Marketing', 'job' => $job->id]))
            ->assertOk()
            ->assertViewHas('selectedJobId', $job->id)
            ->assertViewHas('applicationJobs', fn ($jobs) => $jobs->contains('id', $job->id))
            ->assertViewHas('jobOffers', fn ($jobs) => $jobs->count() === 1 && $jobs->first()->id === $otherJob->id);
    }

    public function test_invalid_jobs_documents_and_missing_required_details_do_not_create_applications(): void
    {
        $this->postJson(route('job-applications.store'), [])
            ->assertUnprocessable()->assertJsonValidationErrors(['name', 'email', 'phone', 'document']);

        $this->postJson(route('job-applications.store'), [
            ...$this->applicant(), 'job_offer_id' => 999999,
        ])->assertUnprocessable()->assertJsonValidationErrors('job_offer_id');

        foreach ([
            UploadedFile::fake()->create('resume.exe', 100, 'application/x-msdownload'),
            UploadedFile::fake()->create('resume.pdf', 5121, 'application/pdf'),
        ] as $document) {
            $this->postJson(route('job-applications.store'), [
                ...$this->applicant(), 'document' => $document,
            ])->assertUnprocessable()->assertJsonValidationErrors('document');
        }

        $this->assertDatabaseCount('job_applications', 0);
        $this->assertSame([], Storage::disk('local')->allFiles());
        Mail::assertNothingSent();
    }

    public function test_guests_and_users_without_job_permissions_cannot_access_applications_or_cvs(): void
    {
        $this->postJson(route('job-applications.store'), $this->applicant($this->job()))->assertCreated();
        $application = JobApplication::firstOrFail();
        $urls = [
            route('dashboard.job-applications.index'),
            route('dashboard.job-applications.show', $application),
            route('dashboard.job-applications.cv', $application),
            route('dashboard.job-applications.download', $application),
        ];

        foreach ($urls as $url) {
            $this->get($url)->assertRedirect(route('login'));
        }

        $this->actingAs(User::factory()->create());
        foreach ($urls as $url) {
            $this->get($url)->assertForbidden();
        }
    }

    public function test_authorized_dashboard_users_can_filter_applications_view_details_and_download_cvs(): void
    {
        $job = $this->job();
        $this->postJson(route('job-applications.store'), $this->applicant($job))->assertCreated();
        $this->postJson(route('job-applications.store'), [
            ...$this->applicant($this->job(['title' => 'Other Job'])), 'name' => 'Other Applicant',
        ])->assertCreated();
        $application = JobApplication::oldest('id')->firstOrFail();
        $this->actingAs($this->reviewer());

        $this->get(route('dashboard.job-applications.index', ['job_offer_id' => $job->id]))
            ->assertOk()->assertSee('Test Applicant')->assertDontSee('Other Applicant')
            ->assertSee(route('dashboard.job-applications.download', $application), false);
        $this->get(route('dashboard.job-applications.index', ['search' => 'Other Applicant']))
            ->assertOk()->assertSee('Other Applicant')->assertDontSee('Test Applicant');
        $this->get(route('dashboard.job-applications.show', $application))
            ->assertOk()->assertSee('Test University')->assertSee('BS Computer Science');
        $this->get(route('dashboard.job-applications.cv', $application))
            ->assertOk()->assertHeader('content-type', 'application/pdf')
            ->assertHeader('x-content-type-options', 'nosniff')
            ->assertHeader('content-disposition', 'inline; filename=resume.pdf');
        $this->get(route('dashboard.job-applications.download', $application))
            ->assertOk()->assertDownload('resume.pdf');
        $this->get(route('dashboard.job-offers.index'))
            ->assertOk()->assertSee('1 applications')
            ->assertSee(route('dashboard.job-applications.index', ['job_offer_id' => $job->id]), false);
    }

    public function test_a_missing_cv_returns_not_found_instead_of_an_error(): void
    {
        $this->postJson(route('job-applications.store'), $this->applicant())->assertCreated();
        $application = JobApplication::firstOrFail();
        Storage::disk('local')->delete($application->document_path);
        $this->actingAs($this->reviewer());

        $this->get(route('dashboard.job-applications.cv', $application))->assertNotFound();
        $this->get(route('dashboard.job-applications.download', $application))->assertNotFound();
    }

    public function test_deleting_a_job_preserves_its_applications_and_job_title(): void
    {
        $job = $this->job();
        $this->postJson(route('job-applications.store'), $this->applicant($job))->assertCreated();
        $job->delete();

        $application = JobApplication::firstOrFail();
        $this->assertNull($application->job_offer_id);
        $this->assertSame($job->title, $application->job_title);
        Storage::disk('local')->assertExists($application->document_path);
    }

    public function test_existing_job_placement_cvs_are_imported_by_the_migration(): void
    {
        Subscriber::create([
            'source' => 'Job Placement', 'name' => 'Previous Applicant', 'email' => 'previous@example.com',
            'document_path' => 'job-placement-documents/previous.pdf', 'document_name' => 'previous.pdf',
        ]);
        Subscriber::create([
            'source' => 'Other enquiry', 'email' => 'other@example.com',
            'document_path' => 'unrelated.pdf', 'document_name' => 'unrelated.pdf',
        ]);
        $migration = require database_path('migrations/2026_10_09_000000_create_job_applications_table.php');
        $migration->down();
        $migration->up();

        $this->assertDatabaseCount('job_applications', 1);
        $this->assertDatabaseHas('job_applications', [
            'name' => 'Previous Applicant', 'document_path' => 'job-placement-documents/previous.pdf',
        ]);
        $this->assertDatabaseCount('subscribers', 2);
    }

    private function job(array $attributes = []): JobOffer
    {
        return JobOffer::create([
            'title' => 'AI & Machine Learning Instructor', 'job_type' => 'Full Time',
            'location' => 'Faisalabad', 'deadline' => now()->addMonth()->toDateString(),
            ...$attributes,
        ]);
    }

    private function applicant(?JobOffer $job = null): array
    {
        return [
            'job_offer_id' => $job?->id, 'name' => 'Test Applicant',
            'email' => 'applicant@example.com', 'phone' => '03140000000',
            'linkedin_url' => 'https://www.linkedin.com/in/test-applicant',
            'institution' => 'Test University', 'city' => 'Faisalabad',
            'qualification' => 'BS Computer Science',
            'document' => UploadedFile::fake()->createWithContent('resume.pdf', "%PDF-1.4\n1 0 obj\n<< /Type /Catalog >>\nendobj\n%%EOF"),
        ];
    }

    private function reviewer(): User
    {
        $role = Role::create(['name' => 'Job Reviewer', 'slug' => 'job-reviewer']);
        $role->permissions()->attach(Permission::where('slug', 'job-offers.view')->firstOrFail());

        return User::factory()->create(['role_id' => $role->id]);
    }
}
