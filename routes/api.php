<?php

use App\Http\Controllers\ClController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return view('home');
})->name('home');
Route::post('/registerCl', [ClController::class, 'registerCl'])->name('registerCl');
Route::post('/loginCl', [ClController::class, 'loginCl'])->name('loginCl');