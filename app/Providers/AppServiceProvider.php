<?php

namespace App\Providers;

use App\Models\Alumni;
use App\Models\Collaborator;
use App\Models\GalleryCategory;
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
        $hasAlumniTable = Schema::hasTable('alumni');
        $hasCollaboratorsTable = Schema::hasTable('collaborators');
        $hasGalleryTables = Schema::hasTable('gallery_categories') && Schema::hasTable('gallery_images');

        View::composer('pages.*', function ($view) use ($hasAlumniTable, $hasCollaboratorsTable, $hasGalleryTables) {
            $view->with([
                'alumni' => $hasAlumniTable ? Alumni::latest()->get() : collect(),
                'collaborators' => $hasCollaboratorsTable ? Collaborator::latest()->get() : collect(),
                'siteGalleryCategories' => $hasGalleryTables
                    ? GalleryCategory::query()
                        ->where('is_active', true)
                        ->with([
                            'images' => fn ($query) => $query
                                ->where('is_active', true)
                                ->orderBy('sort_order')
                                ->orderBy('id'),
                        ])
                        ->orderBy('sort_order')
                        ->orderBy('name')
                        ->get()
                    : collect(),
            ]);
        });
    }
}
