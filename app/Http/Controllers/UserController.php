<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.users.index', [
            'screens' => $this->screens(),
            'active' => 'users',
            'users' => User::with('role')->orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.users.create', [
            'screens' => $this->screens(),
            'active' => 'users',
            'user' => new User,
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role_id' => $validated['role_id'],
        ]);

        return redirect()->route('dashboard.users.index')->with('status', 'User created.');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'screens' => $this->screens(),
            'active' => 'users',
            'user' => $user,
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        if (filled($validated['password'] ?? null)) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()->route('dashboard.users.index')->with('status', 'User updated.');
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->id === $request->user()->id) {
            return redirect()->route('dashboard.users.index')->with('status', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('dashboard.users.index')->with('status', 'User deleted.');
    }
}
