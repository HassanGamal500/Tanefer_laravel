<?php
use Illuminate\Support\Facades\Route;

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
Route::get('/confirm-booking','Front\BookingController@confirmBooking')->name('confirm-booking');
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
Route::post('calculate-all-price' , 'Front\PackageController@calculateAllPrice');

Route::get('gta-store-country' , 'Front\PackageHotelGtaController@store_country_gta');
Route::get('gta-store-region' , 'Front\PackageHotelGtaController@store_region_gta');
Route::get('gta-store-city' , 'Front\PackageHotelGtaController@store_city_gta');
Route::get('gta-store-zone' , 'Front\PackageHotelGtaController@store_zone_gta');
Route::get('gta-store-hotel-catalogue' , 'Front\PackageHotelGtaController@store_hotel_catalogue_data');
Route::get('gta-store-hotel-portfolio' , 'Front\PackageHotelGtaController@store_hotel_portfolio');

Route::get('gta-get-country' , 'Front\PackageHotelGtaController@get_country');
Route::get('gta-get-region' , 'Front\PackageHotelGtaController@get_region');
Route::get('gta-get-city' , 'Front\PackageHotelGtaController@get_city');
Route::get('gta-get-zone' , 'Front\PackageHotelGtaController@get_zone');
Route::get('gta-get-hotel-catalogues' , 'Front\PackageHotelGtaController@get_hotel_catalogues');
Route::get('gta-get-hotel-categories' , 'Front\PackageHotelGtaController@get_hotel_categories');
Route::get('gta-get-hotel-type-categories' , 'Front\PackageHotelGtaController@get_hotel_type_categories');
Route::get('gta-get-room-categories' , 'Front\PackageHotelGtaController@get_room_categories');
Route::get('gta-get-boards' , 'Front\PackageHotelGtaController@get_hotel_boards');
Route::get('gta-get-hotel' , 'Front\PackageHotelGtaController@get_hotel');
//added to test zone search
Route::get('search-zones' , 'Front\PackageHotelGtaController@searchZones');
Route::get('city-by-jpd-code', 'Front\PackageHotelGtaController@get_city_by_jpd_code');
Route::get('search-hotels-by-address', 'Front\PackageHotelGtaController@search_hotels_by_address');


Route::get('get-hotel' , 'Admin\PackageHotelGtaController@sendSoapRequest');
Route::get('get-room-list' , 'Admin\PackageHotelGtaController@roomList');
Route::get('get-content' , 'Admin\PackageHotelGtaController@content');
Route::post('get-availability' , 'Admin\PackageHotelGtaController@availability');
Route::get('get-check-availability' , 'Admin\PackageHotelGtaController@checkAvailability');
Route::post('get-booking-rules' , 'Admin\PackageHotelGtaController@BookingRules');
Route::post('get-booking' , 'Admin\PackageHotelGtaController@Booking');
Route::post('get-cancel-booking' , 'Admin\PackageHotelGtaController@cancelBooking');
Route::get('get-generic_data_catalogue' , 'Admin\PackageHotelGtaController@genericDataCatalogue');
Route::get('get-zone-list' , 'Admin\PackageHotelGtaController@zoneList');
Route::get('get-city-list' , 'Admin\PackageHotelGtaController@cityList');
Route::get('get-hotel-list' , 'Admin\PackageHotelGtaController@hotelList');
Route::get('get-hotel-catalogue-data' , 'Admin\PackageHotelGtaController@hotelCatalogueData');
Route::post('get-booking-test' , 'Admin\PackageHotelGtaController@BookingTest');
Route::get('gta-test-hotel-job' , 'Admin\PackageHotelGtaController@testFinalBookingGtaJob');


Route::get('booking-test-case-hotel-avail' , 'Admin\PackageHotelGtaController@testCasesHotelAvail');
Route::get('booking-test-case-hotel-booking-rule' , 'Admin\PackageHotelGtaController@testCasesHotelBookingRule');
Route::get('booking-test-case-hotel-booking' , 'Admin\PackageHotelGtaController@testCasesHotelBooking');
Route::get('booking-test-case-hotel-read-booking' , 'Admin\PackageHotelGtaController@testCasesHotelReadBooking');
Route::get('booking-test-case-hotel-cancel-booking' , 'Admin\PackageHotelGtaController@testCasesHotelCancelBooking');


Route::get('seo/{id}', 'Front\MainSeoPagesController@show');
