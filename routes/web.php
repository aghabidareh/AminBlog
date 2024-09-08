<?php

use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/' , [HomeController::class,'home'])->name('home');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class,'authLogin'])->name('authLogin');

Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('register', [AuthController::class,'createUser'])->name('userCreation');

Route::get('forgot-password', [AuthController::class,'forgetPassword'])->name('forgot-password');
Route::post('forgot-password', [AuthController::class,'sendForgetPassword'])->name('send-forgot-password');

Route::get('reset/{token}' , [AuthController::class,'reset'])->name('reset');
Route::post('reset/{token}' , [AuthController::class,'postReset'])->name('post-reset');

Route::get('verify/{token}' , [AuthController::class,'verify'])->name('verify');

Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => 'adminuser'] , function(){
    Route::prefix('panel')->group(function(){

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('panel-dashboard');

        Route::prefix('user')->group(function(){

            Route::get('list' , [UserController::class,'user'])->name('panel-user-list');

            Route::get('store' , [UserController::class,'addUser'])->name('add-user'); // showing the view of add user
            Route::post('store' , [UserController::class,'storeUser'])->name('store-user'); // send the request and set all into database

            Route::get('edit/{id}' , [UserController::class,'editUser'])->name('edit-user');
            Route::post('update/{id}' , [UserController::class,'updateUser'])->name('update-user');

            Route::get('delete/{id}', [UserController::class,'deleteUser'])->name('delete-user');

        });
    
    });
});
