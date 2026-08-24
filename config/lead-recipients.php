<?php

return [
    'default' => env('MAIL_INFO_ADDRESS', 'info@career.edu.pk'),
    'sources' => [
        'contact us' => env('MAIL_INFO_ADDRESS', 'info@career.edu.pk'),
        'online admission modal' => env('MAIL_ADMISSIONS_ADDRESS', 'admissions@career.edu.pk'),
        'ambassador program' => env('MAIL_AMBASSADORS_ADDRESS', 'ambassadors@career.edu.pk'),
        'coworking space' => env('MAIL_COWORKING_ADDRESS', 'coworking@career.edu.pk'),
        'study abroad' => env('MAIL_STUDY_ABROAD_ADDRESS', 'studyabroad@career.edu.pk'),
        'psi exam booking' => env('MAIL_EXAMS_ADDRESS', 'exams@career.edu.pk'),
        'job placement' => env('MAIL_JOBS_ADDRESS', 'jobs@career.edu.pk'),
        'partner inquiry - home' => env('MAIL_PARTNERS_ADDRESS', 'partners@career.edu.pk'),
    ],
];
