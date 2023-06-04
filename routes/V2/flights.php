<?php

/*
|--------------------------------------------------------------------------
| Flights API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/airlines/autocomplete' , 'Front\AirlineController@autocomplete');
Route::post('/search' , 'Front\FlightController@search');
Route::post('send-special-offer-request-mail' , 'Front\FlightController@sendMailToBook');
