<?php

namespace Tests\Feature;

use App\Mail\PartnerInquiryNotificationMail;
use App\Mail\PartnershipConfirmationMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PartnerInquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_an_inquiry_and_sends_both_partner_emails(): void
    {
        Mail::fake();

        $response = $this->postJson(route('partner-inquiries.store'), [
            'name' => 'Partner Applicant',
            'phone' => '03140000000',
            'email' => 'partner@example.com',
            'business_interest' => 'Campus collaboration',
            'partnership_opportunity' => 'We would like to discuss a training partnership.',
        ]);

        $response->assertOk()->assertJsonPath('message', 'Thank you. Your partnership request has been received.');
        $this->assertDatabaseHas('partner_inquiries', [
            'email' => 'partner@example.com',
            'business_interest' => 'Campus collaboration',
        ]);
        Mail::assertSent(PartnerInquiryNotificationMail::class);
        Mail::assertSent(PartnershipConfirmationMail::class, function (PartnershipConfirmationMail $mail) {
            return $mail->envelope()->from->address === 'partners@career.edu.pk'
                && $mail->envelope()->subject === 'Thank You for Your Partnership Interest';
        });
    }
}
