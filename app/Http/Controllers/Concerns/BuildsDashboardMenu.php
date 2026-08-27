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
            ['key' => 'partners', 'label' => 'Partners', 'type' => 'dropdown', 'children' => [
                ['label' => 'Partner Inquiries', 'route' => 'dashboard.partner-inquiries.index', 'permission' => 'partners.view'],
            ]],
            ['key' => 'coworking', 'label' => 'Coworking', 'type' => 'dropdown', 'children' => [
                ['label' => 'Coworking Inquiries', 'route' => 'dashboard.coworking-inquiries.index', 'permission' => 'coworking.view'],
            ]],
            ['key' => 'exams', 'label' => 'Exams', 'type' => 'dropdown', 'children' => [
                ['label' => 'Exam Inquiries', 'route' => 'dashboard.exam-inquiries.index', 'permission' => 'exams.view'],
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
            ['key' => 'success-stories', 'label' => 'Success Stories', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add Story', 'route' => 'dashboard.success-stories.create', 'permission' => 'success-stories.create'],
                ['label' => 'All Stories', 'route' => 'dashboard.success-stories.index', 'permission' => 'success-stories.view'],
            ]],
            ['key' => 'job-offers', 'label' => 'Job Offers', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add Job Offer', 'route' => 'dashboard.job-offers.create', 'permission' => 'job-offers.create'],
                ['label' => 'All Job Offers', 'route' => 'dashboard.job-offers.index', 'permission' => 'job-offers.view'],
            ]],
            ['key' => 'collaborators', 'label' => 'Collaborators', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add Collaborator', 'route' => 'dashboard.collaborators.create', 'permission' => 'collaborators.create'],
                ['label' => 'All Collaborators', 'route' => 'dashboard.collaborators.index', 'permission' => 'collaborators.view'],
            ]],
            ['key' => 'gallery', 'label' => 'Gallery', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add Category', 'route' => 'dashboard.gallery.create', 'permission' => 'gallery.create'],
                ['label' => 'All Categories', 'route' => 'dashboard.gallery.index', 'permission' => 'gallery.view'],
            ]],
            ['key' => 'faqs', 'label' => 'FAQs', 'type' => 'dropdown', 'children' => [
                ['label' => 'Add FAQ', 'route' => 'dashboard.faqs.create', 'permission' => 'faqs.create'],
                ['label' => 'All FAQs', 'route' => 'dashboard.faqs.index', 'permission' => 'faqs.view'],
                ['label' => 'Add Category', 'route' => 'dashboard.faqs.categories.create', 'permission' => 'faqs.create'],
                ['label' => 'All Categories', 'route' => 'dashboard.faqs.categories.index', 'permission' => 'faqs.view'],
            ]],
            ['key' => 'administration', 'label' => 'Administration', 'type' => 'dropdown', 'children' => [
                ['label' => 'All Users', 'route' => 'dashboard.users.index', 'permission' => 'users.view'],
                ['label' => 'Roles & Permissions', 'route' => 'dashboard.roles.index', 'permission' => 'roles.view'],
            ]],
        ];
    }
}
