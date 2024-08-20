<?php

use App\Http\Controllers\ApiV2\Front\AuthController;
use App\Http\Controllers\ApiV2\Front\TravellerController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:passport')->group(function () {
    Route::get('profile', [AuthController::class, 'getProfile']);
    Route::post('profile', [AuthController::class, 'updateProfile']);
    Route::post('profile/update-password', [AuthController::class, 'updatePassword']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('/users/save-traveller-data', [TravellerController::class, 'saveTravellerData'])->name('users.saveTravellerData');
    Route::get('/users/get-traveller-data/{userId}', [TravellerController::class, 'getTravellerData'])->name('users.getTravellerData');

});
