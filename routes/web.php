<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

//Landing Page
Route::get('/', function () {
    return view('welcome');
});
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
<<<<<<< Updated upstream
=======

Route::get('/new-employee', function () {
    return view('new-employee');
})->name('new.employee');

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
>>>>>>> Stashed changes
