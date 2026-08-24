<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\SuccessStory;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuccessStoryController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.success-stories.index', [
            'screens' => $this->screens(),
            'active' => 'success-stories',
            'stories' => SuccessStory::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.success-stories.create', [
            'screens' => $this->screens(),
            'active' => 'success-stories',
            'story' => new SuccessStory,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateStory($request, true);
        $validated['image'] = $request->file('image')->store('success-stories', 'public');

        SuccessStory::create($validated);

        return redirect()->route('dashboard.success-stories.index')->with('status', 'Success story added.');
    }

    public function edit(SuccessStory $successStory)
    {
        return view('dashboard.success-stories.edit', [
            'screens' => $this->screens(),
            'active' => 'success-stories',
            'story' => $successStory,
        ]);
    }

    public function update(Request $request, SuccessStory $successStory)
    {
        $validated = $this->validateStory($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('success-stories', 'public');

            if ($successStory->image) {
                Storage::disk('public')->delete($successStory->image);
            }
        }

        $successStory->update($validated);

        return redirect()->route('dashboard.success-stories.index')->with('status', 'Success story updated.');
    }

    public function destroy(SuccessStory $successStory)
    {
        if ($successStory->image) {
            Storage::disk('public')->delete($successStory->image);
        }

        $successStory->delete();

        return redirect()->route('dashboard.success-stories.index')->with('status', 'Success story deleted.');
    }

    private function validateStory(Request $request, bool $imageRequired = false): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'program' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'before_story' => ['required', 'string', 'max:1000'],
            'after_story' => ['required', 'string', 'max:1000'],
            'journey_steps' => ['nullable', 'array', 'max:5'],
            'journey_steps.*' => ['nullable', 'string', 'max:80'],
            'image' => DashboardImageUpload::rules($imageRequired),
        ]);

        $validated['journey_steps'] = collect($validated['journey_steps'] ?? [])
            ->filter(fn ($step) => filled($step))
            ->values()
            ->all();

        return $validated;
    }
}
