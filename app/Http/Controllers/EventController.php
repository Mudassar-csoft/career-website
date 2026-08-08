<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.events.index', [
            'screens' => $this->screens(),
            'active' => 'events',
            'events' => Event::with('category')->withCount('registrations')->latest('event_date')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.events.create', [
            'screens' => $this->screens(),
            'active' => 'events',
            'event' => new Event,
            'categories' => EventCategory::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateEvent($request);

        Event::create($validated);

        return redirect()->route('dashboard.events.index')->with('status', 'Event created.');
    }

    public function edit(Event $event)
    {
        return view('dashboard.events.edit', [
            'screens' => $this->screens(),
            'active' => 'events',
            'event' => $event,
            'categories' => EventCategory::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $this->validateEvent($request, $event);

        $event->update($validated);

        return redirect()->route('dashboard.events.index')->with('status', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('dashboard.events.index')->with('status', 'Event deleted.');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:event_categories,name'],
        ]);

        $category = EventCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return response()->json($category);
    }

    protected function validateEvent(Request $request, ?Event $event = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:events,slug,'.($event->id ?? 'NULL').',id'],
            'event_category_id' => ['required', 'exists:event_categories,id'],
            'event_date' => ['required', 'date'],
            'campus' => ['required', 'string', 'max:255'],
            'venue' => ['required', 'string', 'max:255'],
            'organizer' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_paid' => ['required', 'in:0,1'],
            'fee_amount' => ['nullable', 'required_if:is_paid,1', 'numeric', 'min:0'],
            'has_seat_limit' => ['required', 'in:0,1'],
            'seat_limit' => ['nullable', 'required_if:has_seat_limit,1', 'integer', 'min:1'],
        ]);

        $validated['is_paid'] = (bool) $validated['is_paid'];
        $validated['fee_amount'] = $validated['is_paid'] ? $validated['fee_amount'] : null;

        $validated['has_seat_limit'] = (bool) $validated['has_seat_limit'];
        $validated['seat_limit'] = $validated['has_seat_limit'] ? $validated['seat_limit'] : null;

        return $validated;
    }
}
