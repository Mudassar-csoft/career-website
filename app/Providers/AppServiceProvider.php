<?php

namespace App\Providers;

use App\Models\Alumni;
use App\Models\Collaborator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        if (! Schema::hasTable('alumni') || ! Schema::hasTable('collaborators')) {
            return;
        }

        View::composer('pages.*', function ($view) {
            $view->with([
                'alumni' => Alumni::latest()->get(),
                'collaborators' => Collaborator::latest()->get(),
            ]);
        });
    }
}
