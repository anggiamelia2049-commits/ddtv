<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FlyersController;
use App\Http\Controllers\RunningTextController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\PrayerSchedulesController;
use App\Http\Controllers\TvDisplayController;
use App\Http\Controllers\AuthController;


//  TAMPILAN TV (PUBLIC)

Route::get('/', [TvDisplayController::class, 'index'])->name('tv.index');


// 🔹 LOGIN
// ==========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');


//SEMUA HARUS LOGIN

Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // LOGOUT (POST)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CATEGORY
    Route::resource('category', CategoriesController::class);

    // VIDEOS
    Route::resource('videos', VideosController::class);

    // FLYERS
    Route::resource('flyers', FlyersController::class);

    // BANNERS
    Route::resource('banners', BannersController::class);

    // RUNNING TEXT
    Route::resource('runningtext', RunningTextController::class);

    // PRAYER SCHEDULE
    Route::resource('prayerschedules', PrayerSchedulesController::class);

    // USER
    Route::resource('user', UserController::class);



});
