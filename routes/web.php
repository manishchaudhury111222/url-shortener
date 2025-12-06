<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Auth;

// Auth Routes (Scaffolded by Laravel UI)
Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard (Redirects to correct view based on role)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // URL Creation (SuperAdmin blocked inside controller)
    Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');

    // Invitations (Create Companies/Admins/Members)
    Route::post('/invite', [InvitationController::class, 'store'])->name('invite.store');
});

// Public Redirection Route (Must be last to avoid conflicts)
Route::get('/{code}', [UrlController::class, 'redirect'])->name('urls.redirect');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
