<?php

namespace Tests\Feature;

use App\Mail\NewsletterSubscriptionConfirmationMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NewsletterSubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_saves_a_newsletter_subscriber_and_sends_the_welcome_email(): void
    {
        Mail::fake();

        $response = $this->postJson(route('subscribers.store'), [
            'phone' => '03140000000',
            'email' => 'subscriber@example.com',
            'source' => 'Newsletter - Home',
        ]);

        $response->assertOk()->assertJsonPath('message', 'Thanks! We will be in touch shortly.');
        $this->assertDatabaseHas('subscribers', [
            'email' => 'subscriber@example.com',
            'source' => 'Newsletter - Home',
        ]);
        Mail::assertSent(NewsletterSubscriptionConfirmationMail::class, function (NewsletterSubscriptionConfirmationMail $mail) {
            return $mail->envelope()->from->address === 'newsletters@career.edu.pk'
                && $mail->envelope()->subject === 'Welcome to Career Institute Newsletter';
        });
    }
}
