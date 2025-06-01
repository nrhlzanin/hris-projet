<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AbsensiController;

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

Route::get('/current-plan', function () {
    return view('plans.current-plan');
})->name('current.plan');

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

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/absensi', 'admin.absensi')->name('absensi');
    Route::view('/checklock', 'admin.checklock')->name('checklock');
    Route::view('/overtime', 'admin.over-time')->name('overtime');

    // Employee CRUD
    Route::get('/employee-database', [EmployeeController::class, 'index'])->name('employee.database');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::post('/employee/import', [EmployeeController::class, 'import'])->name('employee.import');
    Route::get('/employee/export', [EmployeeController::class, 'export'])->name('employee.export');
});

// USER ROUTES
Route::prefix('user')->name('user.')->group(function () {
    Route::view('/dashboard', 'user.dashboard')->name('dashboard');
    Route::view('/absensi', 'user.absensi')->name('absensi');
    Route::view('/checklock', 'user.checklock')->name('checklock');
    Route::view('/overtime', 'user.over-time')->name('overtime');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/checklock', [\App\Http\Controllers\User\ChecklockController::class, 'index'])->name('user.checklock');
});

// Google Authentication Routes
Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Register User
Route::post('/sign-up', [RegisterController::class, 'register'])->name('sign.up.submit');
Route::view('/user/absensi', 'user.absensi')->name('user.absensi');
Route::get('/admin/Employee/employee-database', [EmployeeController::class, 'index'])->name('admin.Employee.employee-database');

// Tambahkan route yang hilang untuk employee database
Route::post('/employees/import', [EmployeeController::class, 'import'])->name('employees.import');
Route::get('/new-employee', function () {
    return view('admin.Employee.new-employee');
})->name('new.employee');
Route::get('/admin/Employee/export', [EmployeeController::class, 'export'])->name('employees.export');

// Form tambah employee (GET)
Route::get('/new-employee', [EmployeeController::class, 'create'])->name('new.employee');

// Proses simpan employee (POST)
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::view('/admin/absensi', 'admin.absensi')->name('admin.absensi');

// Form absensi user (GET)
Route::view('/user/absensi', 'user.absensi')->name('user.absensi');

// Proses simpan absensi user (POST)
Route::post('/user/absensi', [AbsensiController::class, 'store'])->name('user.absensi.store');

// Dashboard Admin
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

// Dashboard User
Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');