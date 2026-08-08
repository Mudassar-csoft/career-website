<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventGalleryController extends Controller
{
    use BuildsDashboardMenu;

    public function index(Event $event)
    {
        return view('dashboard.events.gallery', [
            'screens' => $this->screens(),
            'active' => 'events',
            'event' => $event,
            'images' => $event->images()->latest()->get(),
        ]);
    }

    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'max:4096'],
        ]);

        foreach ($validated['images'] as $file) {
            $event->images()->create([
                'image' => $file->store('event-gallery', 'public'),
            ]);
        }

        return back()->with('status', 'Photos uploaded to the gallery.');
    }

    public function destroy(Event $event, EventImage $image)
    {
        if ($image->event_id !== $event->id) {
            abort(404);
        }

        Storage::disk('public')->delete($image->image);
        $image->delete();

        return back()->with('status', 'Photo removed from the gallery.');
    }
}
