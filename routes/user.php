<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User as USER;

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'user', 'saas']], function () {

   //all dashboard routes
   Route::get('dashboard',                       [USER\DashboardController::class, 'index'])->name('dashboard.index');
   //all dashboard routes

   //profile settings
   Route::get('profile',                                 [USER\ProfileController::class, 'settings']);
   Route::put('profile/update/{type}',                   [USER\ProfileController::class, 'update'])->name('profile.update');
   Route::get('auth-key',                                [USER\ProfileController::class, 'authKey']);
   //profile settings 
});
