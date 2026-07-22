<?php

use Illuminate\Support\Facades\Route;

$pages = [
    ['uri' => '/', 'view' => 'pages.home', 'name' => 'home'],
    ['uri' => '/about-us', 'view' => 'pages.about-us', 'name' => 'about'],
    ['uri' => '/ambassador-program', 'view' => 'pages.ambassador-program', 'name' => 'ambassador-program'],
    ['uri' => '/contact-us', 'view' => 'pages.contact-us', 'name' => 'contact-us'],
    ['uri' => '/courses-certifications', 'view' => 'pages.courses-certifications', 'name' => 'courses-certifications'],
    ['uri' => '/coworking-space', 'view' => 'pages.coworking-space', 'name' => 'coworking-space'],
    ['uri' => '/how-to-pay', 'view' => 'pages.how-to-pay', 'name' => 'how-to-pay'],
    ['uri' => '/job-placement', 'view' => 'pages.job-placement', 'name' => 'job-placement'],
    ['uri' => '/kryterion', 'view' => 'pages.kryterion', 'name' => 'kryterion'],
    ['uri' => '/pearson-vue', 'view' => 'pages.pearson-vue', 'name' => 'pearson-vue'],
    ['uri' => '/psi-exam', 'view' => 'pages.psi-exam', 'name' => 'psi-exam'],
    ['uri' => '/study-abroad', 'view' => 'pages.study-abroad', 'name' => 'study-abroad'],
    ['uri' => '/verifications', 'view' => 'pages.verifications', 'name' => 'verifications'],
    ['uri' => '/stories', 'view' => 'pages.stories', 'name' => 'stories'],
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
