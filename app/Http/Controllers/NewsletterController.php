<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Mail\NewsletterMail;
use App\Models\NewsletterMessage;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.newsletter.subscribers', [
            'screens' => $this->screens(),
            'active' => 'newsletter',
            'subscribers' => Subscriber::latest()->get(),
        ]);
    }

    public function messages()
    {
        return view('dashboard.newsletter.messages', [
            'screens' => $this->screens(),
            'active' => 'newsletter',
            'newsletterMessages' => NewsletterMessage::latest()->get(),
        ]);
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'channel' => ['required', Rule::in(['email', 'sms'])],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'recipients' => ['required', 'array', 'min:1'],
            'recipients.*' => ['required', 'string', 'max:255'],
        ]);

        $recipients = array_values(array_unique($validated['recipients']));

        if ($validated['channel'] === 'email') {
            [$status, $note] = $this->sendEmails($recipients, $validated['title'], $validated['body']);
            $sentAt = now();
        } else {
            $status = 'blocked';
            $note = 'SMS gateway is not configured yet. This message was saved but not sent.';
            $sentAt = null;
        }

        NewsletterMessage::create([
            'channel' => $validated['channel'],
            'title' => $validated['title'],
            'body' => $validated['body'],
            'recipients' => $recipients,
            'status' => $status,
            'status_note' => $note,
            'sent_at' => $sentAt,
        ]);

        return redirect()->route('dashboard.newsletter.messages')->with('status', 'Message saved.');
    }

    protected function sendEmails(array $recipients, string $title, string $body): array
    {
        $sent = 0;
        $failed = 0;

        foreach ($recipients as $email) {
            if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $failed++;

                continue;
            }

            try {
                Mail::to($email)->send(new NewsletterMail($title, $body));
                $sent++;
            } catch (\Throwable $e) {
                $failed++;
            }
        }

        if ($failed === 0) {
            return ['sent', null];
        }

        if ($sent === 0) {
            return ['failed', 'All '.count($recipients).' recipient(s) failed.'];
        }

        return ['partial', $failed.' of '.count($recipients).' recipient(s) failed.'];
    }
}
