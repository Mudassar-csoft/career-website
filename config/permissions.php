<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Permission Catalog
    |--------------------------------------------------------------------------
    |
    | Every dashboard module and the actions it supports. This is the single
    | source of truth used to seed the `permissions` table and to render the
    | permission matrix on the Roles screen. Add a module/action here, then
    | run `php artisan db:seed --class=RolePermissionSeeder` to sync it.
    |
    */

    'courses' => [
        'label' => 'Courses',
        'actions' => [
            'view' => 'View Courses',
            'create' => 'Create Courses',
            'edit' => 'Edit Courses',
            'delete' => 'Delete Courses',
        ],
    ],

    'events' => [
        'label' => 'Events',
        'actions' => [
            'view' => 'View Events',
            'create' => 'Create Events',
            'edit' => 'Edit Events & Manage Registrations',
            'delete' => 'Delete Events',
        ],
    ],

    'news' => [
        'label' => 'News',
        'actions' => [
            'view' => 'View News',
            'create' => 'Create News',
            'delete' => 'Delete News',
        ],
    ],

    'blogs' => [
        'label' => 'Blogs',
        'actions' => [
            'view' => 'View Blogs',
            'create' => 'Create Blogs',
            'edit' => 'Edit Blogs',
            'delete' => 'Delete Blogs',
        ],
    ],

    'gallery' => [
        'label' => 'Gallery',
        'actions' => [
            'view' => 'View Gallery',
            'create' => 'Create Gallery Categories',
            'edit' => 'Edit Gallery Categories & Photos',
            'delete' => 'Delete Gallery Categories & Photos',
        ],
    ],

    'faqs' => [
        'label' => 'FAQs',
        'actions' => [
            'view' => 'View FAQs',
            'create' => 'Create FAQs & Categories',
            'edit' => 'Edit FAQs & Categories',
            'delete' => 'Delete FAQs & Categories',
        ],
    ],

    'alumni' => [
        'label' => 'Alumni',
        'actions' => [
            'view' => 'View Alumni',
            'create' => 'Create Alumni',
            'edit' => 'Edit Alumni',
            'delete' => 'Delete Alumni',
        ],
    ],

    'collaborators' => [
        'label' => 'Collaborators',
        'actions' => [
            'view' => 'View Collaborators',
            'create' => 'Create Collaborators',
            'edit' => 'Edit Collaborators',
            'delete' => 'Delete Collaborators',
        ],
    ],

    'newsletter' => [
        'label' => 'Newsletter',
        'actions' => [
            'view' => 'View Newsletter',
            'send' => 'Send Newsletter',
        ],
    ],

    'users' => [
        'label' => 'Users',
        'actions' => [
            'view' => 'View Users',
            'create' => 'Create Users',
            'edit' => 'Edit Users',
            'delete' => 'Delete Users',
        ],
    ],

    'roles' => [
        'label' => 'Roles & Permissions',
        'actions' => [
            'view' => 'View Roles',
            'create' => 'Create Roles',
            'edit' => 'Edit Roles',
            'delete' => 'Delete Roles',
        ],
    ],

];
