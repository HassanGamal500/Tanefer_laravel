<?php

use App\Http\Controllers\ApiV2\Front\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:passport')->group(function () {
    Route::get('histories', [BookingController::class, 'bookingHistory']);
    Route::get('history-details/{id}', [BookingController::class, 'bookingHistoryDetail']);
});
