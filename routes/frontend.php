<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend as FRONTEND;

Auth::routes();

Route::get('/',                      [FRONTEND\HomeController::class, 'index']);
Route::get('/register',             [FRONTEND\HomeController::class, 'register'])->middleware('guest');
Route::post('/register-user',  [FRONTEND\HomeController::class, 'registerUser'])->middleware('guest');
