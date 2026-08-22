<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Event;
use App\Models\EventCategory;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $event = Event::create($validated);

        $uploadedImages = $this->storeEventImages($request, $event);

        return redirect()->route('dashboard.events.index')->with(
            'status',
            $uploadedImages > 0
                ? 'Event created and gallery images uploaded.'
                : 'Event created.'
        );
    }

    public function edit(Event $event)
    {
        return view('dashboard.events.edit', [
            'screens' => $this->screens(),
            'active' => 'events',
            'event' => $event->load('images'),
            'categories' => EventCategory::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $this->validateEvent($request, $event);

        $event->update($validated);

        $uploadedImages = $this->storeEventImages($request, $event);

        return redirect()->route('dashboard.events.index')->with(
            'status',
            $uploadedImages > 0
                ? 'Event updated and new gallery images added.'
                : 'Event updated.'
        );
    }

    public function destroy(Event $event)
    {
        $imagePaths = $event->images()->pluck('image')->filter()->all();

        if ($imagePaths !== []) {
            Storage::disk('public')->delete($imagePaths);
        }

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
            'images' => ['nullable', 'array'],
            'images.*' => array_merge(['nullable'], DashboardImageUpload::baseRules()),
            'is_paid' => ['required', 'in:0,1'],
            'fee_amount' => ['nullable', 'required_if:is_paid,1', 'numeric', 'min:0'],
            'has_seat_limit' => ['required', 'in:0,1'],
            'seat_limit' => ['nullable', 'required_if:has_seat_limit,1', 'integer', 'min:1'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['is_paid'] = (bool) $validated['is_paid'];
        $validated['fee_amount'] = $validated['is_paid'] ? $validated['fee_amount'] : null;

        $validated['has_seat_limit'] = (bool) $validated['has_seat_limit'];
        $validated['seat_limit'] = $validated['has_seat_limit'] ? $validated['seat_limit'] : null;

        return $validated;
    }

    protected function storeEventImages(Request $request, Event $event): int
    {
        if (! $request->hasFile('images')) {
            return 0;
        }

        $count = 0;

        foreach ($request->file('images', []) as $file) {
            if (! $file) {
                continue;
            }

            $event->images()->create([
                'image' => $file->store('event-gallery', 'public'),
            ]);

            $count++;
        }

        return $count;
    }
}
