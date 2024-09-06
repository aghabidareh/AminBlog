<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/' , [HomeController::class,'home'])->name('home');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class,'authLogin'])->name('authLogin');

Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('register', [AuthController::class,'createUser'])->name('userCreation');

Route::get('forgot-password', [AuthController::class,'forgetPassword'])->name('forgot-password');

Route::get('verify/{token}' , [AuthController::class,'verify'])->name('verify');
