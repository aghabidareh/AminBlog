<?php

use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategpryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::namespace("homePage")->group(function () {
    Route::get('/' , [HomeController::class,'home'])->name('home');

    Route::prefix('/')->group(function(){
        Route::namespace('registration')->group(function(){
            Route::get('login', [AuthController::class,'login'])->name('login');
            Route::post('login', [AuthController::class,'authLogin'])->name('authLogin');
        
            Route::get('register', [AuthController::class,'register'])->name('register');
            Route::post('register', [AuthController::class,'createUser'])->name('userCreation');
        
            Route::get('forgot-password', [AuthController::class,'forgetPassword'])->name('forgot-password');
            Route::post('forgot-password', [AuthController::class,'sendForgetPassword'])->name('send-forgot-password');
        
            Route::get('reset/{token}' , [AuthController::class,'reset'])->name('reset');
            Route::post('reset/{token}' , [AuthController::class,'postReset'])->name('post-reset');});
        });
        Route::namespace('mainContents')->group(function(){
            Route::get('about', [HomeController::class,'about'])->name('about');
            Route::get('contact', [HomeController::class,'contact'])->name('contact');
            Route::get('team', [HomeController::class,'team'])->name('team');
            Route::get('gallery', [HomeController::class, 'gallery'])->name('gallery');
            Route::prefix('blog')->group(function(){
                Route::get('/', [HomeController::class,'blog'])->name('blog');
                Route::get('/{slug}', [HomeController::class,'show'])->name('blog-show');
            });
        });
});

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

        Route::prefix('category')->group(function(){
            Route::get('list' , [CategpryController::class,'category'])->name('panel-category-list');

            Route::get('store' , [CategpryController::class,'addCategory'])->name('add-category'); // showing the view of add category
            Route::post('store' , [CategpryController::class,'storeCategory'])->name('store-category'); // send the request and set all into database

            Route::get('edit/{id}' , [CategpryController::class,'editCategory'])->name('edit-category');
            Route::post('update/{id}' , [CategpryController::class,'updateCategory'])->name('update-category');

            Route::get('delete/{id}', [CategpryController::class,'deleteCategory'])->name('delete-category');
        });

        Route::prefix('blog')->group(function(){
            Route::get('list' , [BlogController::class,'blog'])->name('panel-blog-list');

            Route::get('store' , [BlogController::class,'addBlog'])->name('add-blog'); // showing the view of add blog
            Route::post('store' , [BlogController::class,'storeBlog'])->name('store-blog'); // send the request and set all into database

            Route::get('edit/{id}' , [BlogController::class,'editBlog'])->name('edit-blog');
            Route::post('update/{id}' , [BlogController::class,'updateBlog'])->name('update-blog');

            Route::get('delete/{id}', [BlogController::class,'deleteBlog'])->name('delete-blog');
        });
    
    });
});
