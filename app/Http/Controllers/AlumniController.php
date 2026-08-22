<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Alumni;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.alumni.index', [
            'screens' => $this->screens(),
            'active' => 'alumni',
            'alumni' => Alumni::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.alumni.create', [
            'screens' => $this->screens(),
            'active' => 'alumni',
            'alum' => new Alumni,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateAlumni($request, true);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('alumni', 'public');
        }

        Alumni::create($validated);

        return redirect()->route('dashboard.alumni.index')->with('status', 'Alumni review added.');
    }

    public function edit(Alumni $alum)
    {
        return view('dashboard.alumni.edit', [
            'screens' => $this->screens(),
            'active' => 'alumni',
            'alum' => $alum,
        ]);
    }

    public function update(Request $request, Alumni $alum)
    {
        $validated = $this->validateAlumni($request, $alum->resolvePhotoPath() === null);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('alumni', 'public');
        }

        $alum->update($validated);

        return redirect()->route('dashboard.alumni.index')->with('status', 'Alumni review updated.');
    }

    public function destroy(Alumni $alum)
    {
        $alum->delete();

        return redirect()->route('dashboard.alumni.index')->with('status', 'Alumni review deleted.');
    }

    protected function validateAlumni(Request $request, bool $photoRequired = false): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'review' => ['required', 'string'],
            'photo' => DashboardImageUpload::rules($photoRequired),
        ]);
    }
}
