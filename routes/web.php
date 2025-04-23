<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get-started', function () {
    return view('get-started');
})->name('get.started');
Route::get('/sign-in', function () {
    return view('sign-in');
})->name('sign.in');
