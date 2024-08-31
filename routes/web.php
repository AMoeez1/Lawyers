<?php

use App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
    Route::get('login', [ClientController::class, 'showLogin'])->name('login.form');
    Route::post('login', [ClientController::class, 'login'])->name('login');

    Route::get('register', [ClientController::class, 'showRegister'])->name('register.form');
    Route::post('register', [ClientController::class, 'register'])->name('register');

});
    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
// Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
//     Route::get('login');
//     Route::post('login');

//     Route::get('register');
//     Route::post('register');

//     Route::middleware('auth:lawyer', function () {
//         Route::get('/');
//     });
// });