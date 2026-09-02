<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect([
            route('home'),
            route('about'),
            route('courses-certifications'),
            route('study-abroad'),
            route('coworking-space'),
            route('pearson-vue'),
            route('psi-exam'),
            route('kryterion'),
            route('verifications'),
            route('contact-us'),
            route('how-to-pay'),
            route('job-placement'),
            route('ambassador-program'),
            route('stories'),
            route('blogs'),
            route('news'),
            route('events'),
            route('faqs'),
            route('gallery'),
            route('privacy-policy'),
        ])->map(fn (string $location) => ['location' => $location, 'lastmod' => null]);

        $urls = $urls
            ->concat($this->modelUrls(Course::query()->select(['slug', 'updated_at'])->get(), 'course-detail'))
            ->concat($this->modelUrls(Blog::query()->select(['slug', 'updated_at'])->get(), 'blog-detail'))
            ->concat($this->modelUrls(News::query()->select(['slug', 'updated_at'])->get(), 'news-detail'))
            ->concat($this->modelUrls(Event::query()->select(['slug', 'updated_at'])->get(), 'events.show'));

        return response()
            ->view('sitemap', ['urls' => $urls], 200, ['Content-Type' => 'application/xml']);
    }

    private function modelUrls(iterable $models, string $routeName): array
    {
        return collect($models)
            ->map(function ($model) use ($routeName) {
                return [
                    'location' => route($routeName, [$model]),
                    'lastmod' => $model->updated_at?->toDateString(),
                ];
            })
            ->all();
    }
}
