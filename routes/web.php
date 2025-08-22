<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\AdminLoginController;

Route::get('/', fn() => redirect()->route('login.admin'));

// Customer registration
Route::get('/register/customer', [CustomerRegisterController::class, 'showForm'])->name('register.customer.show');
Route::post('/register/customer', [CustomerRegisterController::class, 'register'])->name('register.customer');

// Admin registration
Route::get('/register/admin', [AdminRegisterController::class, 'showForm'])->name('register.admin.show');
Route::post('/register/admin', [AdminRegisterController::class, 'register'])->name('register.admin');

// Email verification
Route::get('/verify', [VerificationController::class, 'show'])->name('verify.show');
Route::post('/verify', [VerificationController::class, 'verify'])->name('verify.submit');

// Admin login
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('login.admin.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('logout.admin');

//  admin home
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', fn() => view('admin.home'))->name('admin.home');
});
