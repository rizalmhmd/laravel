<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public Login Route (untuk user biasa)
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');

// Aktivitas Routes
Route::resource('aktivitas', AktivitasController::class);

Route::get('/contact', [ProfileController::class, 'contact'])->name('contact.index');
Route::post('/contact/send', [ProfileController::class, 'send'])->name('contact.send');

// Social Login Routes (User Biasa)
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('/auth/github', [SocialAuthController::class, 'redirectToGithub'])->name('auth.github');
Route::get('/auth/github/callback', [SocialAuthController::class, 'handleGithubCallback']);

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);
    
    // Social Login untuk Admin
    Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogleAdmin'])->name('auth.google');
    Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallbackAdmin']);
    Route::get('/auth/github', [SocialAuthController::class, 'redirectToGithubAdmin'])->name('auth.github');
    Route::get('/auth/github/callback', [SocialAuthController::class, 'handleGithubCallbackAdmin']);
    
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});

//login register routes for user biasa
Route::get('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');
Route::post('/auth/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//login route for user biasa
Route::get('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');