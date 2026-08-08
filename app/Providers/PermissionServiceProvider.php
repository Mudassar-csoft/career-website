<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        Gate::before(function (?\App\Models\User $user, string $ability) {
            return $user?->isSuperAdmin() ? true : null;
        });

        foreach (Permission::pluck('slug') as $slug) {
            Gate::define($slug, fn (?\App\Models\User $user) => $user?->hasPermission($slug) ?? false);
        }
    }
}
