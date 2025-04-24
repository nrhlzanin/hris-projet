<?php

use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Onboarding Pages
Route::get('/get-started', function () {
    return view('Auth.get-started');
})->name('get.started');

// Authentication
Route::get('/sign-in', function () {
    return view('Auth.sign-in');
})->name('sign.in');

Route::get('/sign-in-employee', function () {
    return view('Auth.sign-in-employee');
})->name('sign.in.employee');

Route::get('/forgot-password', function () {
    return view('Auth.forgot-password');
})->name('forgot.password');

Route::get('/check-your-email', function () {
    return view('Auth.check-your-email');
})->name('check.your.email');

Route::get('/set-new-password', function () {
    return view('Auth.set-new-password');
})->name('set.new.password');

Route::get('/link-expired', function () {
    return view('Auth.link-expired');
})->name('link.expired');

// Employee Database
Route::get('/employee-database', function () {
    return view('Employee.employee-database');
})->name('employee.database');

// Checklock Absen Routes
Route::get('/admin-checklock', function () {
    return view('Checklock.admin_checklock');
})->name('checklock.admin');

Route::get('/admin-absensi', function () {
    return view('Checklock.admin_absensi');
})->name('checklock.admin.absensi');

Route::get('/user-checklock', function () {
    return view('Checklock.user_checklock');
})->name('checklock.user');

Route::get('/user-absensi', function () {
    return view('Checklock.user_absensi');
})->name('checklock.user.absensi');
