<?php

use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Onboarding Pages
Route::get('/get-started', function () {
    return view('get-started');
})->name('get.started');

// Authentication
Route::get('/sign-in', function () {
    return view('sign-in');
})->name('sign.in');
 
Route::get('/sign-in-employee', function () {
    return view('sign-in-employee');
})->name('sign.in.employee');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot.password');
Route::get('/check-your-email', function () {
    return view('check-your-email');
})->name('check.your.email');
Route::get('/set-new-password', function () {
    return view('set-new-password');
})->name('set.new.password');
Route::get('/link-expired', function () {
    return view('link-expired');
})->name('link.expired');

Route::get('/employee-database', function () {
    return view('employee-database');
})->name('employee.database');

//checklock
Route::get('/user_absensi', function () {
    return view('user_absensi');
})->name('user_absensi');

Route::get('/user_checklock', function () {
    return view('user_checklock');
})->name('user_checklock');

Route::get('/admin_absensi', function () {
    return view('admin_absensi');
})->name('admin_absensi');

Route::get('/admin_checklock', function () {
    return view('admin_checklock');
})->name('admin_checklock');

//dashboard
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->name('admin_dashboard');

Route::get('/user-dashboard', function () {
    return view('user_dashboard');
})->name('user_dashboard');