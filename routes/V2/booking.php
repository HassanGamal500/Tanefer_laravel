<?php

use App\Http\Controllers\ApiV2\Front\BookingController;
use Illuminate\Support\Facades\Route;

// Route::middleware('api')->group(function () {
//     Route::get('histories', [BookingController::class, 'bookingHistory']);
//     Route::get('history-details', [BookingController::class, 'bookingHistoryDetail']);
// });


// // Temporarily remove the middleware for testing
// Route::group([], function () {
//     Route::get('histories', [BookingController::class, 'bookingHistory']);
//     Route::get('history-details/{id}', [BookingController::class, 'bookingHistoryDetail']);
// });

Route::get('histories', [BookingController::class, 'bookingHistory']);
Route::get('history-details', [BookingController::class, 'bookingHistoryDetail']);
