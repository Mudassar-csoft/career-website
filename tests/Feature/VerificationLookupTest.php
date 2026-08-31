<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VerificationLookupTest extends TestCase
{
    public function test_it_returns_the_matching_verification_record_for_any_verification_id(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://ims.career.edu.pk/api/verify-certificate/CI-2026-001' => Http::response([
                'status' => 'success',
                'verification_id' => 'CI-2026-001',
                'roll_number' => '24-12345',
                'name' => 'Ayesha Khan',
                'guardian_name' => 'Imran Khan',
                'course_completed' => 'Web Development',
                'course_duration' => '6 Months',
                'document_type' => 'Certificate',
            ]),
        ]);

        $response = $this->getJson(route('verifications.lookup', ['verificationId' => 'CI-2026-001']));

        $response->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('verification_id', 'CI-2026-001')
            ->assertJsonPath('roll_number', '24-12345')
            ->assertJsonPath('name', 'Ayesha Khan');

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://ims.career.edu.pk/api/verify-certificate/CI-2026-001';
        });
    }

    public function test_it_preserves_the_remote_not_found_response_message(): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://ims.career.edu.pk/api/verify-certificate/UNKNOWN-ID' => Http::response([
                'status' => 'error',
                'message' => 'No matching records found for the provided Verification ID.',
            ], 404),
        ]);

        $response = $this->getJson(route('verifications.lookup', ['verificationId' => 'UNKNOWN-ID']));

        $response->assertNotFound()
            ->assertJsonPath('status', 'error')
            ->assertJsonPath('message', 'No matching records found for the provided Verification ID.');
    }

    public function test_it_returns_a_service_error_when_the_remote_verification_api_is_unavailable(): void
    {
        Http::preventStrayRequests();
        Http::fake(fn () => throw new \RuntimeException('IMS unavailable'));

        $response = $this->getJson(route('verifications.lookup', ['verificationId' => 'CI-2026-099']));

        $response->assertStatus(503)
            ->assertJsonPath('status', 'error')
            ->assertJsonPath('message', 'We could not verify this ID right now. Please try again shortly.');
    }
}
