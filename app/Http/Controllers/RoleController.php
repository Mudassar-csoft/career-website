<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.roles.index', [
            'screens' => $this->screens(),
            'active' => 'roles',
            'roles' => Role::withCount(['permissions', 'users'])->orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.roles.create', [
            'screens' => $this->screens(),
            'active' => 'roles',
            'role' => new Role,
            'permissionGroups' => $this->permissionGroups(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateRole($request);

        $role = Role::create([
            'name' => $validated['name'],
            'slug' => str($validated['name'])->slug(),
        ]);

        $role->permissions()->sync($validated['permissions']);

        return redirect()->route('dashboard.roles.index')->with('status', 'Role created.');
    }

    public function edit(Role $role)
    {
        if ($role->is_super_admin) {
            return redirect()->route('dashboard.roles.index')->with('status', 'The Super Admin role always has full access and cannot be edited.');
        }

        return view('dashboard.roles.edit', [
            'screens' => $this->screens(),
            'active' => 'roles',
            'role' => $role->load('permissions'),
            'permissionGroups' => $this->permissionGroups(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        if ($role->is_super_admin) {
            return redirect()->route('dashboard.roles.index')->with('status', 'The Super Admin role always has full access and cannot be edited.');
        }

        $validated = $this->validateRole($request, $role);

        $role->update([
            'name' => $validated['name'],
            'slug' => str($validated['name'])->slug(),
        ]);

        $role->permissions()->sync($validated['permissions']);

        return redirect()->route('dashboard.roles.index')->with('status', 'Role updated.');
    }

    public function destroy(Role $role)
    {
        if ($role->is_super_admin) {
            return redirect()->route('dashboard.roles.index')->with('status', 'The Super Admin role cannot be deleted.');
        }

        if ($role->users()->exists()) {
            return redirect()->route('dashboard.roles.index')->with('status', 'Reassign the users on this role before deleting it.');
        }

        $role->delete();

        return redirect()->route('dashboard.roles.index')->with('status', 'Role deleted.');
    }

    protected function validateRole(Request $request, ?Role $role = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($role?->id)],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ]) + ['permissions' => $request->input('permissions', [])];
    }

    protected function permissionGroups()
    {
        return Permission::orderBy('module')->orderBy('action')->get()->groupBy('module');
    }
}
