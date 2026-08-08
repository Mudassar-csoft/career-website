<?php

namespace App\Http\Controllers\Concerns;

trait BuildsDashboardMenu
{
    protected function screens()
    {
        return collect($this->menu())
            ->map(function ($item) {
                $item['uri'] = isset($item['route']) ? route($item['route']) : null;

                if (isset($item['children'])) {
                    $item['children'] = collect($item['children'])
                        ->filter(fn ($child) => ! isset($child['permission']) || auth()->user()?->can($child['permission']))
                        ->map(function ($child) {
                            $child['uri'] = route($child['route']);

                            return $child;
                        })
                        ->values()
                        ->all();
                }

                return $item;
            })
            ->filter(function ($item) {
                if (isset($item['children'])) {
                    return count($item['children']) > 0;
                }

                return ! isset($item['permission']) || auth()->user()?->can($item['permission']);
            })
            ->values();
    }

    protected function menu(): array
    {
        return [
            ['key' => 'dashboard', 'label' => 'Dashboard', 'type' => 'home'],
            ['key' => 'courses', 'label' => 'Courses', 'type' => 'dropdown', 'children' => [
                ['label' => 'Create Course', 'route' => 'dashboard.courses.create', 'permission' => 'courses.create'],
                ['label' => 'All Courses', 'route' => 'dashboard.courses.index', 'permission' => 'courses.view'],
            ]],
            ['key' => 'newsletter', 'label' => 'Newsletter', 'type' => 'dropdown', 'children' => [
                ['label' => 'All Subscribers', 'route' => 'dashboard.newsletter.index', 'permission' => 'newsletter.view'],
                ['label' => 'Messages', 'route' => 'dashboard.newsletter.messages', 'permission' => 'newsletter.view'],
            ]],
            ['key' => 'events', 'label' => 'Events', 'type' => 'dropdown', 'children' => [
                ['label' => 'Create Event', 'route' => 'dashboard.events.create', 'permission' => 'events.create'],
                ['label' => 'All Events', 'route' => 'dashboard.events.index', 'permission' => 'events.view'],
            ]],
            ['key' => 'news', 'label' => 'News', 'type' => 'dropdown', 'children' => [
                ['label' => 'Create News', 'route' => 'dashboard.news.create', 'permission' => 'news.create'],
                ['label' => 'All News', 'route' => 'dashboard.news.index', 'permission' => 'news.view'],
            ]],
            ['key' => 'blogs', 'label' => 'Blogs', 'type' => 'dropdown', 'children' => [
                ['label' => 'Create Blog', 'route' => 'dashboard.blogs.create', 'permission' => 'blogs.create'],
                ['label' => 'All Blogs', 'route' => 'dashboard.blogs.index', 'permission' => 'blogs.view'],
            ]],
            ['key' => 'alumni', 'label' => 'Alumni', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add Alumni', 'route' => 'dashboard.alumni.create', 'permission' => 'alumni.create'],
                ['label' => 'All Alumni', 'route' => 'dashboard.alumni.index', 'permission' => 'alumni.view'],
            ]],
            ['key' => 'collaborators', 'label' => 'Collaborators', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add Collaborator', 'route' => 'dashboard.collaborators.create', 'permission' => 'collaborators.create'],
                ['label' => 'All Collaborators', 'route' => 'dashboard.collaborators.index', 'permission' => 'collaborators.view'],
            ]],
            ['key' => 'gallery', 'label' => 'Gallery', 'type' => 'soon'],
            ['key' => 'faq', 'label' => 'FAQ', 'type' => 'soon'],
            ['key' => 'administration', 'label' => 'Administration', 'type' => 'dropdown', 'children' => [
                ['label' => 'All Users', 'route' => 'dashboard.users.index', 'permission' => 'users.view'],
                ['label' => 'Roles & Permissions', 'route' => 'dashboard.roles.index', 'permission' => 'roles.view'],
            ]],
        ];
    }
}
