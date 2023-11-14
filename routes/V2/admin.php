<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Admin')->group(function (){

    Route::apiResource('cities', 'TourCityController');
    Route::apiResource('tours', 'TourController');
    Route::post('tours/update/{id}' , 'TourController@update'); //can't upload image with put/patch
    Route::apiResource('tour/program', 'TourProgramController');
    Route::apiResource('tour/inclusion', 'TourInclusionController');
    Route::apiResource('tour/exclusion', 'TourExclusionController');
    Route::apiResource('tour/extaActivities', 'TourExtraActivitiesController');
    Route::apiResource('tour/prices', 'TourPricesController');
    Route::apiResource('tour/places', 'TourPlacesController');
    Route::apiResource('tour/images', 'TourImagesController');
    Route::post('tour/images/update/{id}', 'TourImagesController@update');
    Route::get('tour/city/airportAutocomplete','TourCityController@tourCityAirportAutocomplete');

    # --------- package Hotel season section ------------------
    Route::group(['prefix'=> 'season'],function (){
        Route::get('/', 'PackageHotelSeasonController@index');
        Route::post('store', 'PackageHotelSeasonController@store');
        Route::get('{packageHotelSeason}/edit', 'PackageHotelSeasonController@edit');
        Route::post('{packageHotelSeason}/update', 'PackageHotelSeasonController@update');
        Route::delete('{packageHotelSeason}/delete', 'PackageHotelSeasonController@destroy');

    });

    # --------- package Hotel  section ------------------
    Route::group(['prefix'=> 'hotel'],function (){
        Route::get('/', 'PackageHotelController@index');
        Route::get('form-lists', 'PackageHotelController@formLists');
        Route::post('store', 'PackageHotelController@store');
        Route::post('children', 'PackageHotelController@childrenPolicy');

        Route::get('{packageHotel}/show', 'PackageHotelController@show');
        Route::put('{packageHotel}/update', 'PackageHotelController@update');
        Route::delete('{packageHotel}/delete', 'PackageHotelController@destroy');
        Route::get('hotel-list', 'PackageHotelController@hotelFilteredByCity');
        Route::get('hotel-rooms', 'PackageHotelController@hotelRoomsFilteredByHotel');
    });

    # --------- Cruise Section -----------------#

    Route::group(['prefix' => 'cruises'], function () {

        Route::get('/city/{id}' , 'CruiseController@listOfCruises');
        Route::get('/' , 'CruiseController@index');
        Route::get('/{id}' , 'CruiseController@show');
        Route::post('/store', 'CruiseController@store');
        Route::put('/{id}/update' , 'CruiseController@update');
        Route::post('/children-policy', 'CruiseController@childrenPolicy');

        Route::delete('/delete-image/{id}' , 'CruiseController@removeImage');
    });

    # --------- package Activities  section ------------------
    Route::apiResource('activities','PackageActivityController');
    Route::get('activities/form/lists', 'PackageActivityController@formLists');
    Route::get('activities/activity/list', 'PackageActivityController@ActivityFilteredByCity');
    Route::get('activitiescruise/activity/list', 'PackageActivityController@ActivityCruiseFilteredByCity');
    Route::get('activities-bookings' , 'BookingController@activityBookings');

    Route::get('bookingDetails/{id}' , 'BookingController@bookingDetails');
//    Route::group(['prefix'=> 'activities'],function (){
//        Route::resource('/','PackageActivityController');
//        //Route::get('/', 'PackageActivityController@index');
//        Route::get('form-lists', 'PackageActivityController@formLists');
//        //Route::post('store/', 'PackageActivityController@store');
//        //Route::get('{packageActivity}/show', 'PackageActivityController@show');
//        //Route::put('{packageActivity}/update', 'PackageActivityController@update');
//        //Route::delete('{packageActivity}/delete', 'PackageActivityController@destroy');
//        Route::get('activity-list', 'PackageActivityController@ActivityFilteredByCity');
//    });

 # --------- packages  section ------------------
    Route::group(['prefix'=> 'packages'],function (){
        Route::get('/', 'PackageController@index');
        Route::get('form-lists', 'PackageController@formLists');
        Route::post('add', 'PackageController@store');
        Route::get('slug-availability','PackageController@checkSlugAvailability');
        Route::get('{id}/show', 'PackageController@show');
        Route::put('{id}/update', 'PackageController@update');
        Route::delete('{package}/delete', 'PackageController@destroy');
        Route::get('bookings' , 'BookingController@packageBookings');
    });
    Route::group(['prefix'=> 'seo'],function (){
        Route::get('/', 'MainSeoPagesController@index');
        Route::post('/add', 'MainSeoPagesController@store');
        Route::get('/{id}', 'MainSeoPagesController@show');
        Route::post('update/{id}', 'MainSeoPagesController@update');
    });

});
