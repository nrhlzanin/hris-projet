<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\LoginController;

//Supabase
Route::get('/supabase-test', function () {
    return DB::select('SELECT NOW()');
});

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Pricing Page
Route::get('/pricing-plans', function () {
    return view('plans.pricing-plans');
})->name('pricing.plans');

Route::get('/choose-pro', function () {
    return view('plans.choose-pro');
})->name('choose.pro');

Route::get('/choose-lite', function () {
    return view('plans.choose-lite');
})->name('choose.lite');

// Onboarding Pages
Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('sign.up');

// Authentication
// Form login (email + password)
Route::get('/sign-in', [LoginController::class, 'showLoginForm'])->name('sign.in');

// Form login alternatif (misalnya pakai ID)
Route::get('/sign-in-id', [LoginController::class, 'showLoginFormId'])->name('sign.in.id');

// Proses login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-id', [LoginController::class, 'loginWithId'])->name('login.id');
Route::post('/sign-in', [LoginController::class, 'login'])->name('sign.in.submit');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');

Route::get('/check-your-email', function () {
    return view('auth.check-your-email');
})->name('check.your.email');

Route::get('/set-new-password', function () {
    return view('auth.set-new-password');
})->name('set.new.password');

Route::get('/link-expired', function () {
    return view('auth.link-expired');
})->name('link.expired');

Route::get('/password-update', function () {
    return view('auth.password-update');
})->name('password.update');

// Auth middleware group
Route::middleware(['auth'])->group(function () {
    
    // ADMIN ROUTES
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        // Employee CRUD
        Route::get('/employee-database', [EmployeeController::class, 'index'])->name('employee.database');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
        Route::post('/employee/import', [EmployeeController::class, 'import'])->name('employee.import');

        // Admin other views (blade files already exist)
        Route::view('/checklock', 'admin.Employee.checklock')->name('checklock');
        Route::view('/absensi', 'admin.Employee.absensi')->name('absensi');
        Route::view('/overtime', 'admin.Employee.over-time')->name('overtime');
    });

    // USER ROUTES
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        Route::view('/checklock', 'user.checklock')->name('checklock');
        Route::view('/absensi', 'user.absensi')->name('absensi');
        Route::view('/overtime', 'user.over-time')->name('overtime');
    });
});

// Google Authentication Routes
Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Register User
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign.up.submit');