<?php

namespace Tests\Feature;

use App\Mail\CareerCounselingConfirmationMail;
use App\Models\Subscriber;
use Tests\TestCase;

class CareerCounselingConfirmationMailTest extends TestCase
{
    public function test_it_uses_the_info_mailbox_for_career_counseling_confirmations(): void
    {
        $mail = new CareerCounselingConfirmationMail(new Subscriber([
            'name' => 'Test Student',
            'email' => 'student@example.com',
        ]));

        $envelope = $mail->envelope();

        $this->assertSame('info@career.edu.pk', $envelope->from->address);
        $this->assertSame('info@career.edu.pk', $envelope->replyTo[0]->address);
        $this->assertSame('Thank You for Contacting Career Institute', $envelope->subject);
    }
}
