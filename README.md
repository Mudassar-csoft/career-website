# Career Website

This project has been converted from a static HTML site into a Laravel application.

## Requirements

- PHP 8.2+
- Composer

## Run locally

```bash
copy .env.example .env
composer install
php artisan key:generate
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Main routes

- `/`
- `/about-us`
- `/ambassador-program`
- `/contact-us`
- `/courses-certifications`
- `/coworking-space`
- `/how-to-pay`
- `/job-placement`
- `/kryterion`
- `/pearson-vue`
- `/psi-exam`
- `/study-abroad`
- `/verifications`

Legacy `.html` URLs are redirected to the Laravel routes.
