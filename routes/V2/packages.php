<?php
/*
|--------------------------------------------------------------------------
| Packages API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('home-page', 'Front\PackageController@index');
Route::get('top-packages', 'Front\PackageController@topPackages');

Route::get('/search/{city_id?}', 'Front\PackageController@search');
Route::get('details/{term}', 'Front\PackageController@details')->name('site.package.details');
//Route::get('details/{trip}', 'Front\PackageController@details');
Route::get('filter/{max_nights_number?}', 'Front\FilterController@index');
Route::get('childrenpolicy/{package_id}', 'Front\PackageController@childrenpolicy');
Route::get('/calculateoccupancy/{trip?}','Front\PackageController@calculateOccupancy');

Route::get('activity', 'Front\PackageActivityController@index');

//Route::get('packagetests',function (){
//   $value = \Illuminate\Support\Facades\DB::table('package_activities')->first();
//   $fixed = json_decode($value->includes);
//   dd($value);
//});

Route::post('save', 'Front\BookingController@save');
Route::post('complete/{booking_id}', 'Front\BookingController@complete');
Route::post('save-to-email','Front\BookingController@saveToEmail');
Route::get('/custom-package','Front\BookingController@displayCustomPackage');
Route::get('/confirm-booking','Front\BookingController@confirmBooking');
Route::get('/booking-details/{id}' , 'Front\BookingController@bookingDetails');

Route::get('/activities/search', 'Front\PackageActivityController@index');
Route::post('/activities/search/filter', 'Front\PackageActivityController@filterSearch');
Route::get('/activities/duration/filter', 'Front\PackageActivityController@durationvalue');
Route::get('/activities/city/filter', 'Front\PackageActivityController@TourCityvalue');
Route::get('/activities/price/filter', 'Front\PackageActivityController@pricefiltervalue');

Route::post('activities/book','Front\PackageActivityController@book');
Route::post('activities/calculate-total-price','Front\PackageActivityController@calculateActivitiesPrice');
Route::post('activities/calculate-tour-total-price','Front\PackageActivityController@calculateTourActivitiesPrice');
Route::post('activities/validate-time-tour','Front\PackageActivityController@validateTimeTour');
Route::post('test','Front\BookingController@testmail');

Route::post('calculate-total-price' , 'Front\PackageController@calculateTotalPrice');



Route::get('get-hotel' , 'Admin\PackageHotelGtaController@sendSoapRequest');
Route::get('get-room-list' , 'Admin\PackageHotelGtaController@roomList');
Route::get('get-content' , 'Admin\PackageHotelGtaController@content');
Route::get('get-availability' , 'Admin\PackageHotelGtaController@availability');
Route::get('get-check-availability' , 'Admin\PackageHotelGtaController@checkAvailability');
Route::get('get-booking-rules' , 'Admin\PackageHotelGtaController@BookingRules');
Route::get('get-booking' , 'Admin\PackageHotelGtaController@Booking');
Route::get('get-cancel-booking' , 'Admin\PackageHotelGtaController@cancelBooking');


