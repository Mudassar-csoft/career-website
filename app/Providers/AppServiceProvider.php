<?php

namespace App\Providers;

use App\Models\Alumni;
use App\Models\Collaborator;
use App\Models\Faq;
use App\Models\FaqCategory;
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
        $hasFaqTables = Schema::hasTable('faq_categories') && Schema::hasTable('faqs');
        $hasGalleryTables = Schema::hasTable('gallery_categories') && Schema::hasTable('gallery_images');

        View::composer('pages.*', function ($view) use ($hasAlumniTable, $hasCollaboratorsTable, $hasFaqTables, $hasGalleryTables) {
            $view->with([
                'alumni' => $hasAlumniTable ? Alumni::latest()->get() : collect(),
                'collaborators' => $hasCollaboratorsTable ? Collaborator::latest()->get() : collect(),
                'siteFaqCategories' => $hasFaqTables
                    ? FaqCategory::query()
                        ->where('is_active', true)
                        ->withCount([
                            'faqs' => fn ($query) => $query->where('is_active', true),
                        ])
                        ->orderBy('sort_order')
                        ->orderBy('name')
                        ->get()
                    : collect(),
                'siteFaqItems' => $hasFaqTables
                    ? Faq::query()
                        ->with('category')
                        ->where('is_active', true)
                        ->whereHas('category', fn ($query) => $query->where('is_active', true))
                        ->orderBy('sort_order')
                        ->orderBy('id')
                        ->get()
                    : collect(),
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
