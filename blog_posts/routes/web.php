<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;








Route::get('/',[HomeController::class,'home'])->name('home');

Route::post('/user/login',[UserController::class,'login'])->name('login');


Route::group(['prefix'=> 'admin'],function(){
    Route::group(['middleware' => 'auth'],function(){

        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::get('user/logout',[UserController::class,'logout'])->name('logout');
        
        Route::controller(PostController::class)->group(function(){
            Route::get('post/index','index')->name('post.index');
            Route::get('post/create','create')->name('post.create');
            Route::post('post/store','store')->name('post.store');
            Route::get('post/edit/{id}','edit')->name('post.edit');
            Route::put('post/update/{id}','update')->name('post.update');
            Route::get('post/delete/{id}','delete')->name('post.delete');

            Route::get('/post/approved/{id}',[PostController::class,'approved'])->name('post.approved');
            Route::get('/post/reject/{id}',[PostController::class,'reject'])->name('post.reject');

        
        });
    });

});

