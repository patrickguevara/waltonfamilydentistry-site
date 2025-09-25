<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{doctor:slug}', [DoctorController::class, 'show'])->name('doctors.show');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/contact', ContactController::class)->name('contact');

Route::get('/privacy', StaticPageController::class)->defaults('page', 'privacy')->name('privacy');
Route::get('/terms', StaticPageController::class)->defaults('page', 'terms')->name('terms');

Route::get('/sitemap.xml', [UtilityController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [UtilityController::class, 'robots'])->name('robots');
Route::get('/healthz', [UtilityController::class, 'health'])->name('health');
