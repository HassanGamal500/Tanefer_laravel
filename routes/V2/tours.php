<?php

/*
|--------------------------------------------------------------------------
| Trips API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Front')->group(function (){
    Route::get('/city/autocomplete' , 'TourController@autocomplete');
    Route::get('/list-city' , 'TourController@allCityies');
    Route::get('/search' , 'TourController@toursSearch');

    Route::get('/details' , 'TourController@tourdetails');

    Route::get('/booking' , 'TourController@tourBooking');
    Route::post('/request-to-book' , 'TourController@storeBooking');
    Route::get('/totalPrice' , 'TourController@calTotalPrice');
});
