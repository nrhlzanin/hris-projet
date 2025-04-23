<?php

use Illuminate\Support\Facades\Route;

//Landing Page
Route::get('/', function () {
    return view('welcome');
});
<<<<<<< Updated upstream
=======
//Sign up
Route::get('/get-started', function () {
    return view('get-started');
})->name('get.started');
//Sign in
Route::get('/sign-in', function () {
    return view('sign-in');
})->name('sign.in');
//Emplyee Database
Route::get('/employee-database', function () {
    return view('employee-database');
})->name('employee.database');
>>>>>>> Stashed changes
