<?php

namespace App\Http\Controllers\Concerns;

trait BuildsDashboardMenu
{
    protected function screens()
    {
        return collect($this->menu())->map(function ($item) {
            $item['uri'] = isset($item['route']) ? route($item['route']) : null;

            if (isset($item['children'])) {
                $item['children'] = collect($item['children'])->map(function ($child) {
                    $child['uri'] = route($child['route']);

                    return $child;
                })->all();
            }

            return $item;
        });
    }

    protected function menu(): array
    {
        return [
            ['key' => 'dashboard', 'label' => 'Dashboard', 'type' => 'home'],
            ['key' => 'courses', 'label' => 'Courses', 'type' => 'page', 'route' => 'courses-certifications'],
            ['key' => 'newsletter', 'label' => 'Newsletter', 'type' => 'dropdown', 'children' => [
                ['label' => 'All Subscribers', 'route' => 'dashboard.newsletter.index'],
                ['label' => 'Messages', 'route' => 'dashboard.newsletter.messages'],
            ]],
            ['key' => 'events', 'label' => 'Events', 'type' => 'page', 'route' => 'events'],
            ['key' => 'news', 'label' => 'News', 'type' => 'dropdown', 'children' => [
                ['label' => 'Create News', 'route' => 'dashboard.news.create'],
                ['label' => 'All News', 'route' => 'dashboard.news.index'],
            ]],
            ['key' => 'blogs', 'label' => 'Blogs', 'type' => 'soon'],
            ['key' => 'alumni', 'label' => 'Alumni', 'type' => 'soon'],
            ['key' => 'collaborators', 'label' => 'Collaborators', 'type' => 'soon'],
            ['key' => 'gallery', 'label' => 'Gallery', 'type' => 'soon'],
            ['key' => 'faq', 'label' => 'FAQ', 'type' => 'soon'],
        ];
    }
}
