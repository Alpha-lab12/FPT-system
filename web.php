<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration', [RegistrationController::class, 'registration']);
Route::get('/login', [RegistrationController::class, 'login'])->name('login');
Route::post('/signin', [RegistrationController::class, 'signin']);
Route::post('/register', [RegistrationController::class, 'register']);
Route::get('/HRsdashboard', [RegistrationController::class, 'HRsdashboard'])->name('HRsdashboard');
Route::get('/HODdashboard', [RegistrationController::class, 'HODdashboard'])->name('HODdashboard');
Route::get('/Sdashboard', [RegistrationController::class, 'Sdashboard'])->name('Sdashboard');
Route::get('/Ldashboard', [RegistrationController::class, 'Ldashboard'])->name('Ldashboard');


Route::post('/logout', [RegistrationController::class, 'logout']);