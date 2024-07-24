<?php

use App\Http\Controllers\AchievmentController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViolationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('role:admin')->group(function () {
        Route::resource('/user', UserController::class);
        Route::resource('/classroom', ClassroomController::class);
        Route::resource('/student', StudentController::class);
        Route::resource('/violation', ViolationController::class);

        // one route
        // Route::get('/achievment/{id}', [AchievmentController::class, 'index',])->name('achievment.index');
        Route::resource('/achievment', AchievmentController::class);
    });
});
