<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class,'login'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::get('forgot-password', [AuthController::class,'forgetPassword'])->name('forgot-password');
