<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Collaborator;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.collaborators.index', [
            'screens' => $this->screens(),
            'active' => 'collaborators',
            'collaborators' => Collaborator::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.collaborators.create', [
            'screens' => $this->screens(),
            'active' => 'collaborators',
            'collaborator' => new Collaborator,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => DashboardImageUpload::rules(true),
        ]);

        $validated['logo'] = $request->file('logo')->store('collaborators', 'public');

        Collaborator::create($validated);

        return redirect()->route('dashboard.collaborators.index')->with('status', 'Collaborator added.');
    }

    public function edit(Collaborator $collaborator)
    {
        return view('dashboard.collaborators.edit', [
            'screens' => $this->screens(),
            'active' => 'collaborators',
            'collaborator' => $collaborator,
        ]);
    }

    public function update(Request $request, Collaborator $collaborator)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => DashboardImageUpload::rules(),
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('collaborators', 'public');
        }

        $collaborator->update($validated);

        return redirect()->route('dashboard.collaborators.index')->with('status', 'Collaborator updated.');
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();

        return redirect()->route('dashboard.collaborators.index')->with('status', 'Collaborator deleted.');
    }
}
