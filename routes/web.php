<?php

use App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\Auth\LawyerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
    Route::get('login', [ClientController::class, 'showLogin'])->name('login.form');
    Route::post('login', [ClientController::class, 'login'])->name('login');
    Route::post('logout', [ClientController::class, 'logout'])->name('logout');

    Route::get('register', [ClientController::class, 'showRegister'])->name('register.form');
    Route::post('register', [ClientController::class, 'register'])->name('register');

});
    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::group(['prefix' => 'lawyer', 'as' => 'lawyer.'], function () {
    Route::get('login', [LawyerController::class, 'showLogin'])->name('login.form');
    Route::post('login',[LawyerController::class,'login'])->name('login');

    Route::get('register',[LawyerController::class, 'showRegister'])->name('regsiter.form');
    Route::post('register',[LawyerController::class, 'register'])->name('register');

    // Route::middleware('auth:lawyer', function () {
    //     Route::get('/');
    // });
});