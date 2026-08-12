<?php

namespace App\Http\Controllers;

use App\Mail\EventFeeVoucherMail;
use App\Mail\EventPassMail;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EventRegistrationController extends Controller
{
    public function index()
    {
        return view('pages.events', [
            'upcomingEvents' => Event::with('category')
                ->where('event_date', '>=', now()->toDateString())
                ->orderBy('event_date')
                ->take(8)
                ->get(),
            'recentEvents' => Event::with('category')
                ->where('event_date', '<', now()->toDateString())
                ->orderByDesc('event_date')
                ->take(4)
                ->get(),
        ]);
    }

    public function show(Event $event)
    {
        return view('pages.event-show', [
            'event' => $event->load('category'),
        ]);
    }

    public function register(Request $request, Event $event)
    {
        if (! $event->isUpcoming()) {
            return back()->withErrors(['registration' => 'Registration for this event has closed.']);
        }

        if (! $event->hasSeatsAvailable()) {
            return back()->withErrors(['registration' => 'Sorry, this event is fully booked.']);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('event_registrations', 'email')->where('event_id', $event->id),
            ],
            'phone' => ['nullable', 'string', 'max:30'],
        ], [
            'email.unique' => 'This email has already been registered for this event.',
        ]);

        $registration = EventRegistration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'status' => $event->is_paid ? 'pending' : 'participant',
            'token' => Str::random(40),
        ]);

        if ($event->is_paid) {
            Mail::to($registration->email)->send(new EventFeeVoucherMail($registration));

            return redirect()->route('events.show', $event)
                ->with('status', 'You are registered! Check your email for the fee voucher and payment instructions.');
        }

        Mail::to($registration->email)->send(new EventPassMail($registration));

        return redirect()->route('events.show', $event)
            ->with('status', 'You are registered! Check your email for your event pass.');
    }

    public function showUploadFee(string $token)
    {
        $registration = EventRegistration::with('event')->where('token', $token)->firstOrFail();

        return view('pages.event-upload-fee', [
            'registration' => $registration,
        ]);
    }

    public function uploadFee(Request $request, string $token)
    {
        $registration = EventRegistration::with('event')->where('token', $token)->firstOrFail();

        if ($registration->isParticipant()) {
            return back()->with('status', 'Your fee is already confirmed — no need to upload again.');
        }

        $validated = $request->validate([
            'fee_proof' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:4096'],
        ]);

        $registration->update([
            'fee_proof' => $validated['fee_proof']->store('event-fee-proofs', 'public'),
        ]);

        return back()->with('status', 'Thanks! Your payment receipt was submitted and is awaiting review. You will receive your pass by email once it is confirmed.');
    }
}
