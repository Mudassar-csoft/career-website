<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Mail\EventPassMail;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Mail;

class EventRegistrantController extends Controller
{
    use BuildsDashboardMenu;

    public function index(Event $event)
    {
        return view('dashboard.events.registrants', [
            'screens' => $this->screens(),
            'active' => 'events',
            'event' => $event,
            'registrations' => $event->registrations()->latest()->get(),
        ]);
    }

    public function clearFee(Event $event, EventRegistration $registration)
    {
        if ($registration->event_id !== $event->id) {
            abort(404);
        }

        if ($registration->isParticipant()) {
            return back()->with('status', 'This registration is already marked as a participant.');
        }

        $registration->update(['status' => 'participant']);

        Mail::to($registration->email)->send(new EventPassMail($registration));

        return back()->with('status', 'Fee cleared — the participant has been emailed their pass.');
    }
}
