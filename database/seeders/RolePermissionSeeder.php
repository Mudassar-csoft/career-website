<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seed the permission catalog, the Super Admin role, and an initial admin user.
     */
    public function run(): void
    {
        $permissionIds = [];

        foreach (config('permissions', []) as $module => $config) {
            foreach ($config['actions'] as $action => $label) {
                $permission = Permission::updateOrCreate(
                    ['slug' => "{$module}.{$action}"],
                    ['module' => $module, 'action' => $action, 'name' => $label]
                );

                $permissionIds[] = $permission->id;
            }
        }

        $superAdminRole = Role::updateOrCreate(
            ['slug' => 'super-admin'],
            ['name' => 'Super Admin', 'is_super_admin' => true]
        );

        $superAdminRole->permissions()->sync($permissionIds);

        if (! User::whereHas('role', fn ($q) => $q->where('is_super_admin', true))->exists()) {
            $password = Str::password(12);

            $admin = User::create([
                'name' => 'Admin',
                'email' => 'adeeljavaid.pk@gmail.com',
                'password' => Hash::make($password),
                'role_id' => $superAdminRole->id,
            ]);

            $this->command?->warn("Super Admin created — email: {$admin->email} / password: {$password}");
            $this->command?->warn('Please sign in and change this password right away.');
        }
    }
}
