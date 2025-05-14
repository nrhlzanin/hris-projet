<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Onboarding Pages
Route::get('/get-started', function () {
    return view('auth.get-started');
})->name('get.started');

// Authentication
Route::get('/sign-in', function () {
    return view('auth.sign-in');
})->name('sign.in');

Route::get('/sign-in-employee', function () {
    return view('auth.sign-in-employee');
})->name('sign.in.employee');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');

Route::get('/check-your-email', function () {
    return view('auth.check-your-email');
})->name('check.your.email');

Route::get('/set-new-password', function () {
    return view('auth.set-new-password');
})->name('set.new.password');

Route::get('/auth/link-expired', function () {
    return view('auth.link-expired');
})->name('link.expired');

// Dashboard
Route::get('/admin-dashboard', function () {
    return view('dasbord.admin-dashboard');
})->name('admin-dashboard');

// Employee
Route::get('/employee-database', function () {
    return view('employee.employee-database');
})->name('employee.database');

Route::get('/new-employee', function () {
    return view('employee.new-employee');
})->name('new.employee');

// Checklock
Route::get('/user-checklock', function () {
    return view('checklock.user_checklock');
})->name('user_checklock');

Route::get('/user-absensi', function () {
    return view('checklock.user_absensi');
})->name('user_absensi');

Route::get('/admin-checklock', function () {
    return view('checklock.admin_checklock');
})->name('admin_checklock');

Route::get('/admin-absensi', function () {
    return view('checklock.admin_absensi');
})->name('admin_absensi');
