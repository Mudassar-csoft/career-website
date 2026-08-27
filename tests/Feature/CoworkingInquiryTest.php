<?php

namespace Tests\Feature;

use App\Mail\CoworkingConfirmationMail;
use App\Mail\CoworkingInquiryNotificationMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CoworkingInquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_an_inquiry_and_sends_both_coworking_emails(): void
    {
        Mail::fake();

        $response = $this->postJson(route('coworking-inquiries.store'), [
            'name' => 'Coworking Applicant',
            'email' => 'coworking@example.com',
            'phone' => '03140000000',
            'city' => 'Faisalabad',
            'interested_in' => 'Dedicated Desk',
            'number_of_persons' => 3,
        ]);

        $response->assertOk()->assertJsonPath('message', 'Thank you. Your coworking request has been received.');
        $this->assertDatabaseHas('coworking_inquiries', [
            'email' => 'coworking@example.com',
            'interested_in' => 'Dedicated Desk',
            'number_of_persons' => 3,
        ]);
        Mail::assertSent(CoworkingInquiryNotificationMail::class);
        Mail::assertSent(CoworkingConfirmationMail::class, function (CoworkingConfirmationMail $mail) {
            return $mail->envelope()->from->address === 'coworking@career.edu.pk'
                && $mail->envelope()->subject === 'Thank You for Your Coworking Interest';
        });
    }
}
