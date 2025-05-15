<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;

//Supabase
Route::get('/supabase-test', function () {
    return DB::select('SELECT NOW()');
});
=======
>>>>>>> c14bf6b5eb3c242e549e291d8312bc2e48775ad1

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

Route::get('/link-expired', function () {
    return view('auth.link-expired');
})->name('link.expired');

Route::get('/password-update', function () {
    return view('auth.password-update');
})->name('password.update');

// Dashboard
Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');

Route::get('/user-dashboard', function () {
    return view('dasbord.user-dashboard');
})->name('user.dashboard');

// Employee
Route::get('/employee-database', [EmployeeController::class, 'index'])->name('employee.database');

Route::get('/new-employee', function () {
    return view('employee.new-employee');
})->name('new.employee');

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::post('/employees/import', [EmployeeController::class, 'import'])->name('employees.import');

// Checklock
Route::get('/user-checklock', [UserController::class, 'checkLock'])->name('user_checklock');

Route::get('/user-absensi', [UserController::class, 'absensi'])->name('user_absensi');

Route::get('/admin-checklock', function () {
    return view('checklock.admin_checklock');
})->name('admin.checklock');

Route::get('/admin-absensi', function () {
    return view('checklock.admin_absensi');
})->name('admin.absensi');
