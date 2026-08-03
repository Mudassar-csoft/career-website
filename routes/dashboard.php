<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/', [NewsController::class, 'store'])->name('store');
        Route::post('/types', [NewsController::class, 'storeType'])->name('types.store');
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('newsletter')->name('newsletter.')->group(function () {
        Route::get('/', [NewsletterController::class, 'index'])->name('index');
        Route::get('/messages', [NewsletterController::class, 'messages'])->name('messages');
        Route::post('/send', [NewsletterController::class, 'send'])->name('send');
    });

    Route::get('/{page}', [DashboardController::class, 'index'])->name('show');
});
