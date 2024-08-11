<?php

use App\Http\Controllers\ApiV2\Front\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('histories', [BookingController::class, 'bookingHistory']);
    Route::get('history-details', [BookingController::class, 'bookingHistoryDetail']);
});
