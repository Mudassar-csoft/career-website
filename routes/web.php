<?php

use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicBlogController;
use App\Http\Controllers\PublicCourseController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribers.store');

Route::get('/events/register/{token}/upload-fee', [EventRegistrationController::class, 'showUploadFee'])->name('events.upload-fee');
Route::post('/events/register/{token}/upload-fee', [EventRegistrationController::class, 'uploadFee'])->name('events.upload-fee');
Route::get('/events/{event:slug}', [EventRegistrationController::class, 'show'])->name('events.show');
Route::post('/events/{event:slug}/register', [EventRegistrationController::class, 'register'])->name('events.register');

Route::get('/courses-certifications', [PublicCourseController::class, 'index'])->name('courses-certifications');
Route::get('/course-detail/{course:slug}', [PublicCourseController::class, 'show'])->name('course-detail');

Route::get('/news', [PublicNewsController::class, 'index'])->name('news');
Route::get('/news-detail/{news:slug}', [PublicNewsController::class, 'show'])->name('news-detail');

Route::get('/blogs', [PublicBlogController::class, 'index'])->name('blogs');
Route::get('/blog-detail/{blog:slug}', [PublicBlogController::class, 'show'])->name('blog-detail');

$pages = [
    ['uri' => '/about-us', 'view' => 'pages.about-us', 'name' => 'about'],
    ['uri' => '/ambassador-program', 'view' => 'pages.ambassador-program', 'name' => 'ambassador-program'],
    ['uri' => '/contact-us', 'view' => 'pages.contact-us', 'name' => 'contact-us'],
    ['uri' => '/coworking-space', 'view' => 'pages.coworking-space', 'name' => 'coworking-space'],
    ['uri' => '/how-to-pay', 'view' => 'pages.how-to-pay', 'name' => 'how-to-pay'],
    ['uri' => '/job-placement', 'view' => 'pages.job-placement', 'name' => 'job-placement'],
    ['uri' => '/kryterion', 'view' => 'pages.kryterion', 'name' => 'kryterion'],
    ['uri' => '/pearson-vue', 'view' => 'pages.pearson-vue', 'name' => 'pearson-vue'],
    ['uri' => '/psi-exam', 'view' => 'pages.psi-exam', 'name' => 'psi-exam'],
    ['uri' => '/study-abroad', 'view' => 'pages.study-abroad', 'name' => 'study-abroad'],
    ['uri' => '/verifications', 'view' => 'pages.verifications', 'name' => 'verifications'],
    ['uri' => '/stories', 'view' => 'pages.stories', 'name' => 'stories'],
    ['uri' => '/events', 'view' => 'pages.events', 'name' => 'events'],
    ['uri' => '/category', 'view' => 'pages.category', 'name' => 'category'],
    ['uri' => '/event-detail', 'view' => 'pages.event-detail', 'name' => 'event-detail'],
    ['uri' => '/faqs', 'view' => 'pages.faqs', 'name' => 'faqs'],
];

foreach ($pages as $page) {
    Route::view($page['uri'], $page['view'])->name($page['name']);
}

Route::redirect('/index.html', '/', 301);
Route::redirect('/about-us.html', '/about-us', 301);
Route::redirect('/ambassador-program.html', '/ambassador-program', 301);
Route::redirect('/contact-us.html', '/contact-us', 301);
Route::redirect('/Courses-Certifications.html', '/courses-certifications', 301);
Route::redirect('/coworking-space.html', '/coworking-space', 301);
Route::redirect('/how-to-pay.html', '/how-to-pay', 301);
Route::redirect('/job-placement.html', '/job-placement', 301);
Route::redirect('/Kryterion.html', '/kryterion', 301);
Route::redirect('/Person-Vue.html', '/pearson-vue', 301);
Route::redirect('/PSI-Exam.html', '/psi-exam', 301);
Route::redirect('/study-abroad.html', '/study-abroad', 301);
Route::redirect('/Verifications.html', '/verifications', 301);
Route::redirect('/stories.html', '/stories', 301);
Route::redirect('/course-detail.html', '/course-detail', 301);
Route::redirect('/news-detail.html', '/news-detail', 301);
Route::redirect('/news.html', '/news', 301);
Route::redirect('/events.html', '/events', 301);
Route::redirect('/category.html', '/category', 301);
Route::redirect('/event-detail.html', '/event-detail', 301);
Route::redirect('/faqs.html', '/faqs', 301);
