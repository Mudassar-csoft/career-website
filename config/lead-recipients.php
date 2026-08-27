<?php

return [
    'default' => env('MAIL_INFO_ADDRESS', 'info@career.edu.pk'),
    'addresses' => [
        'info' => env('MAIL_INFO_ADDRESS', 'info@career.edu.pk'),
        'admissions' => env('MAIL_ADMISSIONS_ADDRESS', 'admissions@career.edu.pk'),
        'coworking' => env('MAIL_COWORKING_ADDRESS', 'coworking@career.edu.pk'),
        'exams' => env('MAIL_EXAMS_ADDRESS', 'exams@career.edu.pk'),
        'partners' => env('MAIL_PARTNERS_ADDRESS', 'partners@career.edu.pk'),
        'payments' => env('MAIL_PAYMENTS_ADDRESS', 'payments@career.edu.pk'),
        'verifications' => env('MAIL_VERIFICATIONS_ADDRESS', 'verifications@career.edu.pk'),
        'newsletters' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
        'events' => env('MAIL_EVENTS_ADDRESS', 'events@career.edu.pk'),
    ],
    'sources' => [
        'contact us' => env('MAIL_INFO_ADDRESS', 'info@career.edu.pk'),
        'online admission modal' => env('MAIL_ADMISSIONS_ADDRESS', 'admissions@career.edu.pk'),
        'ambassador program' => env('MAIL_AMBASSADORS_ADDRESS', 'ambassadors@career.edu.pk'),
        'coworking space' => env('MAIL_COWORKING_ADDRESS', 'coworking@career.edu.pk'),
        'study abroad' => env('MAIL_STUDY_ABROAD_ADDRESS', 'studyabroad@career.edu.pk'),
        'psi exam booking' => env('MAIL_EXAMS_ADDRESS', 'exams@career.edu.pk'),
        'job placement' => env('MAIL_JOBS_ADDRESS', 'jobs@career.edu.pk'),
        'partner inquiry - home' => env('MAIL_PARTNERS_ADDRESS', 'partners@career.edu.pk'),
        'newsletter - home' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
        'newsletter - events' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
        'newsletter - event detail' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
        'newsletter - blog detail' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
        'newsletter - news' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
        'newsletter - news detail' => env('MAIL_NEWSLETTERS_ADDRESS', 'newsletters@career.edu.pk'),
    ],
];
