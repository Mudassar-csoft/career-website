<?php

namespace App\Http\Controllers;

use App\Mail\LeadNotificationMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $isImsLead = $request->filled('lead_type');

        $rules = [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'source' => ['nullable', 'string', 'max:255'],
        ];

        if ($isImsLead) {
            $rules = array_merge($rules, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'phone' => ['required', 'string', 'max:30'],
                'course' => ['nullable', 'string', 'max:255'],
                'campus_id' => ['nullable', 'integer'],
                'gender' => ['nullable', 'in:Male,Female'],
                'lead_type' => ['required', 'in:quick_lead,admission,brochure_lead,website_enrollment'],
            ]);
        }

        $validated = $request->validate($rules);

        if (empty($validated['email']) && empty($validated['phone'])) {
            $message = 'Please provide an email or phone number.';

            if ($request->wantsJson()) {
                return response()->json(['message' => $message], 422);
            }

            return back()->withErrors(['email' => $message])->withInput();
        }

        if ($isImsLead) {
            $imsResponse = $this->sendToIms($validated);

            if ($imsResponse !== null) {
                if ($request->wantsJson()) {
                    return response()->json(['message' => $imsResponse], 422);
                }

                return back()->withErrors(['email' => $imsResponse])->withInput();
            }
        }

        // Keep contactable Quick Leads available to the dashboard newsletter module.
        $subscriberData = [
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'source' => $validated['source'] ?? null,
        ];

        if ($isImsLead && $validated['lead_type'] === 'quick_lead') {
            $subscriberData['source'] = 'Career Counseling - Quick Lead';
        }

        $subscriber = null;

        if (! empty($validated['email'])) {
            $subscriber = Subscriber::where('email', $validated['email'])->first();
        }

        if (! $subscriber && ! empty($validated['phone'])) {
            $subscriber = Subscriber::where('phone', $validated['phone'])->first();
        }

        if ($subscriber) {
            $subscriber->fill(array_filter($subscriberData))->save();
        } else {
            $subscriber = Subscriber::create(array_filter($subscriberData));
        }

        $recipient = config('lead-recipients.sources.'.strtolower((string) $subscriber->source))
            ?: config('lead-recipients.default');

        try {
            Mail::to($recipient)->send(new LeadNotificationMail($subscriber));
        } catch (\Throwable $exception) {
            report($exception);
        }

        $message = $isImsLead
            ? $this->successMessage($validated['lead_type'])
            : 'Thanks! We will be in touch shortly.';

        if ($request->wantsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('status', $message);
    }

    private function sendToIms(array $data): ?string
    {
        $leadTypes = [
            'quick_lead' => 'Quick Lead',
            'admission' => 'Admission',
            'brochure_lead' => 'Brochure Lead',
            'website_enrollment' => 'website_enrollment',
        ];

        try {
            $response = Http::acceptJson()
                ->timeout(15)
                ->post(config('services.ims.web_leads_url'), [
                    'name' => $data['name'],
                    'course' => $data['course'] ?? null,
                    'primary_contact' => $data['phone'],
                    'campus_id' => $data['campus_id'] ?? 9,
                    'gender' => $data['gender'] ?? 'Male',
                    'email' => $data['email'],
                    'city' => 'Faisalabad',
                    'status' => 'Pending',
                    'type' => $leadTypes[$data['lead_type']],
                ]);
        } catch (\Throwable $exception) {
            report($exception);

            return 'We could not submit your request right now. Please try again shortly.';
        }

        if ($response->successful()) {
            return null;
        }

        report(new \RuntimeException('IMS lead submission failed with HTTP status '.$response->status()));

        return data_get($response->json(), 'message')
            ?: 'We could not submit your request. Please check your details and try again.';
    }

    private function successMessage(string $leadType): string
    {
        return match ($leadType) {
            'quick_lead' => 'Your free career counseling request has been received. A career advisor will contact you shortly.',
            'admission' => 'Your online admission request has been received. Our admissions team will contact you shortly.',
            'brochure_lead' => 'Your brochure request has been received. Our team will share the course information shortly.',
            'website_enrollment' => 'Your enrollment request has been received. Our admissions team will guide you through the next steps.',
        };
    }
}
