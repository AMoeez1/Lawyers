<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class,'index']);

Route::get('/', function () {
    return view('home');
});
Route::get('/register/client', function () {
    return view('Auth/register_cl');
});
Route::get('/register/lawyer', function () {
    return view('Auth/register_law');
});
// Route::get('/login/lawyer', function () {
//     return view('Auth/login_law');
// });
Route::get('/login/client', function () {
    return view('Auth/loginCl');
});
