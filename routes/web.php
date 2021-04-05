<?php

// use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[UserController::class,'index']);
Route::get('register',[UserController::class,'index1']);

Route::post('User/auth',[UserController::class,'auth'])->name('user.auth'); 

Route::post('regauth',[UserController::class,'store'])->name('regauth'); 

Route::middleware(['user_auth'])->group(function() {
    Route::get('user/dashboard',[UserController::class,'dashboard']);
    Route::get('user/showtask',[TaskController::class,'index']);
    // Route::get('user/taskshow',[TaskController::class,'index']);

    Route::get('user/logout',[UserController::class,'logout']);
});


