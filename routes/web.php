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

    Route::get('/profile/{id}', [ClientController::class, 'profile'])->name('profile');

    Route::get('/profile/edit/{id}', [ClientController::class, 'show_edit'])->name('show_edit');
    Route::post('/profile/{id}', [ClientController::class, 'edit_profile'])->name('edit_profile');

    Route::post('/remove/profile/{id}', [ClientController::class, 'removeProfile'])->name('remove_profile_pic');
});
    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post',[HomeController::class, 'showPost'])->name('post.form');
Route::post('/post',[HomeController::class, 'post'])->name('post');

Route::group(['prefix' => 'lawyer', 'as' => 'lawyer.'], function () {
    Route::get('login', [LawyerController::class, 'showLogin'])->name('login.form');
    Route::post('login',[LawyerController::class,'login'])->name('login');
    Route::post('logout',[LawyerController::class,'logout'])->name('logout');

    Route::get('register',[LawyerController::class, 'showRegister'])->name('regsiter.form');
    Route::post('register',[LawyerController::class, 'register'])->name('register');

    Route::get('/profile/{id}', [LawyerController::class,'profile'])->name('profile');

    Route::get('/profile/edit/{id}', [LawyerController::class,'show_edit'])->name('show_edit');
    Route::post('/profile/edit/{id}', [LawyerController::class,'edit_profile'])->name('edit_profile');

    Route::post('/remove/profile/{id}', [LawyerController::class,'removeProfile'])->name('remove_profile_pic');
// Route::post('/bookLawyer',[HomeController::class, 'bookLawyer'])->name('booking');
    // Route::middleware('auth:lawyer', function () {
    //     Route::get('/');
    // });
});