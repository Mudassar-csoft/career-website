<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventGalleryController;
use App\Http\Controllers\EventRegistrantController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuccessStoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.attempt');
});

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index')->middleware('can:news.view');
        Route::get('/create', [NewsController::class, 'create'])->name('create')->middleware('can:news.create');
        Route::post('/', [NewsController::class, 'store'])->name('store')->middleware('can:news.create');
        Route::post('/types', [NewsController::class, 'storeType'])->name('types.store')->middleware('can:news.create');
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit')->middleware('can:news.edit');
        Route::put('/{news}', [NewsController::class, 'update'])->name('update')->middleware('can:news.edit');
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy')->middleware('can:news.delete');
    });

    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index')->middleware('can:courses.view');
        Route::get('/data', [CourseController::class, 'data'])->name('data')->middleware('can:courses.view');
        Route::get('/create', [CourseController::class, 'create'])->name('create')->middleware('can:courses.create');
        Route::post('/', [CourseController::class, 'store'])->name('store')->middleware('can:courses.create');
        Route::post('/categories', [CourseController::class, 'storeCategory'])->name('categories.store')->middleware('can:courses.create');
        Route::post('/modes', [CourseController::class, 'storeMode'])->name('modes.store')->middleware('can:courses.create');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('edit')->middleware('can:courses.edit');
        Route::put('/{course}', [CourseController::class, 'update'])->name('update')->middleware('can:courses.edit');
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('destroy')->middleware('can:courses.delete');
    });

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index')->middleware('can:events.view');
        Route::get('/create', [EventController::class, 'create'])->name('create')->middleware('can:events.create');
        Route::post('/', [EventController::class, 'store'])->name('store')->middleware('can:events.create');
        Route::post('/categories', [EventController::class, 'storeCategory'])->name('categories.store')->middleware('can:events.create');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit')->middleware('can:events.edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('update')->middleware('can:events.edit');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy')->middleware('can:events.delete');

        Route::prefix('{event}/registrants')->name('registrants.')->middleware('can:events.edit')->group(function () {
            Route::get('/', [EventRegistrantController::class, 'index'])->name('index');
            Route::post('/{registration}/clear-fee', [EventRegistrantController::class, 'clearFee'])->name('clear-fee');
        });

        Route::prefix('{event}/gallery')->name('gallery.')->middleware('can:events.edit')->group(function () {
            Route::get('/', [EventGalleryController::class, 'index'])->name('index');
            Route::post('/', [EventGalleryController::class, 'store'])->name('store');
            Route::delete('/{image}', [EventGalleryController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index')->middleware('can:blogs.view');
        Route::get('/create', [BlogController::class, 'create'])->name('create')->middleware('can:blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('store')->middleware('can:blogs.create');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit')->middleware('can:blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('update')->middleware('can:blogs.edit');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy')->middleware('can:blogs.delete');
    });

    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [GalleryCategoryController::class, 'index'])->name('index')->middleware('can:gallery.view');
        Route::get('/create', [GalleryCategoryController::class, 'create'])->name('create')->middleware('can:gallery.create');
        Route::post('/', [GalleryCategoryController::class, 'store'])->name('store')->middleware('can:gallery.create');
        Route::get('/{galleryCategory}/edit', [GalleryCategoryController::class, 'edit'])->name('edit')->middleware('can:gallery.edit');
        Route::put('/{galleryCategory}', [GalleryCategoryController::class, 'update'])->name('update')->middleware('can:gallery.edit');
        Route::delete('/{galleryCategory}', [GalleryCategoryController::class, 'destroy'])->name('destroy')->middleware('can:gallery.delete');

        Route::prefix('{galleryCategory}/images')->name('images.')->middleware('can:gallery.edit')->group(function () {
            Route::get('/', [GalleryImageController::class, 'index'])->name('index');
            Route::post('/', [GalleryImageController::class, 'store'])->name('store');
            Route::delete('/{galleryImage}', [GalleryImageController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('faqs')->name('faqs.')->group(function () {
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [FaqCategoryController::class, 'index'])->name('index')->middleware('can:faqs.view');
            Route::get('/create', [FaqCategoryController::class, 'create'])->name('create')->middleware('can:faqs.create');
            Route::post('/', [FaqCategoryController::class, 'store'])->name('store')->middleware('can:faqs.create');
            Route::get('/{faqCategory}/edit', [FaqCategoryController::class, 'edit'])->name('edit')->middleware('can:faqs.edit');
            Route::put('/{faqCategory}', [FaqCategoryController::class, 'update'])->name('update')->middleware('can:faqs.edit');
            Route::delete('/{faqCategory}', [FaqCategoryController::class, 'destroy'])->name('destroy')->middleware('can:faqs.delete');
        });

        Route::get('/', [FaqController::class, 'index'])->name('index')->middleware('can:faqs.view');
        Route::get('/create', [FaqController::class, 'create'])->name('create')->middleware('can:faqs.create');
        Route::post('/', [FaqController::class, 'store'])->name('store')->middleware('can:faqs.create');
        Route::get('/{faq}/edit', [FaqController::class, 'edit'])->name('edit')->middleware('can:faqs.edit');
        Route::put('/{faq}', [FaqController::class, 'update'])->name('update')->middleware('can:faqs.edit');
        Route::delete('/{faq}', [FaqController::class, 'destroy'])->name('destroy')->middleware('can:faqs.delete');
    });

    Route::prefix('alumni')->name('alumni.')->group(function () {
        Route::get('/', [AlumniController::class, 'index'])->name('index')->middleware('can:alumni.view');
        Route::get('/create', [AlumniController::class, 'create'])->name('create')->middleware('can:alumni.create');
        Route::post('/', [AlumniController::class, 'store'])->name('store')->middleware('can:alumni.create');
        Route::get('/{alum}/edit', [AlumniController::class, 'edit'])->name('edit')->middleware('can:alumni.edit');
        Route::put('/{alum}', [AlumniController::class, 'update'])->name('update')->middleware('can:alumni.edit');
        Route::delete('/{alum}', [AlumniController::class, 'destroy'])->name('destroy')->middleware('can:alumni.delete');
    });

    Route::prefix('success-stories')->name('success-stories.')->group(function () {
        Route::get('/', [SuccessStoryController::class, 'index'])->name('index')->middleware('can:success-stories.view');
        Route::get('/create', [SuccessStoryController::class, 'create'])->name('create')->middleware('can:success-stories.create');
        Route::post('/', [SuccessStoryController::class, 'store'])->name('store')->middleware('can:success-stories.create');
        Route::get('/{successStory}/edit', [SuccessStoryController::class, 'edit'])->name('edit')->middleware('can:success-stories.edit');
        Route::put('/{successStory}', [SuccessStoryController::class, 'update'])->name('update')->middleware('can:success-stories.edit');
        Route::delete('/{successStory}', [SuccessStoryController::class, 'destroy'])->name('destroy')->middleware('can:success-stories.delete');
    });

    Route::prefix('collaborators')->name('collaborators.')->group(function () {
        Route::get('/', [CollaboratorController::class, 'index'])->name('index')->middleware('can:collaborators.view');
        Route::get('/create', [CollaboratorController::class, 'create'])->name('create')->middleware('can:collaborators.create');
        Route::post('/', [CollaboratorController::class, 'store'])->name('store')->middleware('can:collaborators.create');
        Route::get('/{collaborator}/edit', [CollaboratorController::class, 'edit'])->name('edit')->middleware('can:collaborators.edit');
        Route::put('/{collaborator}', [CollaboratorController::class, 'update'])->name('update')->middleware('can:collaborators.edit');
        Route::delete('/{collaborator}', [CollaboratorController::class, 'destroy'])->name('destroy')->middleware('can:collaborators.delete');
    });

    Route::prefix('newsletter')->name('newsletter.')->group(function () {
        Route::get('/', [NewsletterController::class, 'index'])->name('index')->middleware('can:newsletter.view');
        Route::get('/messages', [NewsletterController::class, 'messages'])->name('messages')->middleware('can:newsletter.view');
        Route::post('/send', [NewsletterController::class, 'send'])->name('send')->middleware('can:newsletter.send');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('can:roles.view');
        Route::get('/create', [RoleController::class, 'create'])->name('create')->middleware('can:roles.create');
        Route::post('/', [RoleController::class, 'store'])->name('store')->middleware('can:roles.create');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit')->middleware('can:roles.edit');
        Route::put('/{role}', [RoleController::class, 'update'])->name('update')->middleware('can:roles.edit');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('can:roles.delete');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index')->middleware('can:users.view');
        Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('can:users.create');
        Route::post('/', [UserController::class, 'store'])->name('store')->middleware('can:users.create');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('can:users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('can:users.edit');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware('can:users.delete');
    });

    Route::get('/{page}', [DashboardController::class, 'index'])->name('show');
});
