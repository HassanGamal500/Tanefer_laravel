<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/PayfortAPI','PayfortController@tokenizationResponse');
Route::post('/callback','PayfortController@processReturn');

Route::any('paymentNotifications','PayfortController@notifications');

    Route::any('flights/bookings/notification' , [
        'uses' => 'SabreNotificationController@getNotification',
        'as'   => 'notifications',
    ]);

    Route::post('/user/login' , [
        'uses' => 'Auth\LoginController@login'
    ]);

    Route::post('user/register' , [
        'uses' => 'Auth\RegisterController@create'
    ]);

    Route::post('reset-password-code' , [
        'uses' => 'Auth\ResetPasswordController@create'
    ]);

    Route::post('reset-password' , [
        'uses' => 'Auth\ResetPasswordController@reset'
    ]);

    Route::post('email/resend', [
        'uses' => 'Auth\VerificationController@resend',
        'as' => 'verificationapi.resend'
    ]);

    Route::post('user/logout' , [
        'uses' => 'Auth\LoginController@logout'
    ]);

    Route::post('email/verify/', [
        'uses' => 'Auth\VerificationController@verify',
        'as'   => 'verificationapi.verify'
    ]);


    Route::namespace('User')->group(function (){

        Route::post('user/device-token',[
            'uses' => 'PushNotificationToken@store'
        ]);

        Route::get('airlineLogo' , 'AirportsController@airlinesLogo');

        Route::get('trips', [
            'uses' => 'TripsController@index'
        ]);
        Route::get('trips-in-home/{tripsNumber}' , [
            'uses' => 'TripsController@tripsInHome'
        ]);

        Route::post('user/updateNotification' , [
            'uses' => 'UserController@updateNotification'
        ]);

        Route::get('user/profile' , [
            'uses' => 'UserController@show'
        ]);
        Route::post('user/update' , [
            'uses' => 'UserController@update'
        ]);

        Route::get('user/bookings' , [
            'uses' => 'UserController@bookings'
        ]);

        Route::get('user/collect-points-history' , [
            'uses' => 'UserController@collectHistory'
        ]);

        Route::get('user/redeem-points-history' , [
            'uses' => 'UserController@redeemHistory'
        ]);

        Route::get('/airport/autocomplete/' , [
            'uses' => 'AirportsController@autocomplete'
        ]);

        //One Time Use
//        Route::get('/airport/getCityCodes', [
//            'uses' => 'AirportsController@addCitiesForExistingAirports'
//        ]);

        Route::get('flights/promotions' , [
            'uses' => 'FlightsController@flightsPromotions'
        ]);

        Route::get('/flights/search' , [
            'uses' => 'FlightsController@search'
        ]);

        Route::get('/flights' , [
            'uses' => 'FlightsController@show'
        ]);

        Route::post('/pnr/create' , [
            'uses' => 'PNRController@create'
        ]);

        Route::get('/pnr/{pnr}' , [
            'uses' => 'PNRController@show'
        ]);

        Route::post('/pnr/validate-credit-card' , [
            'uses' => 'PNRController@validateCreditCard'
        ]);


        /*   Cars Endpoints    */

        Route::get('cars/search' , [
            'uses' => 'CarsController@search'
        ]);

        Route::get('cars/show' , [
            'uses' => 'CarsController@show'
        ]);

        Route::post('cars/book' , [
            'uses' => 'CarsController@book'
        ]);


        /*       Hotels Endpoints       */

        Route::get('cities/autocomplete' , [
            'uses' => 'CitiesController@autocomplete'
        ]);

        Route::get('hotels/search' , [
            'uses' => 'HotelsController@search'
        ]);

        Route::get('hotels/show' , [
            'uses' => 'HotelsController@show'
        ]);

        Route::get('hotels/roomsAvailability', [
            'uses' => 'HotelsController@roomsAvailability'
        ]);

        Route::get('hotels/roomsAvailabilityAndPricing', [
            'uses' => 'HotelsController@roomsAvailabilityAndPricing'
        ]);


         Route::post('hotels/book' , [
            'uses' => 'BookHotelController@book'
        ]);


        Route::post('hotels/booking-details', [
            'uses' => 'BookHotelController@bookingDetails'
        ]);
    });



    /// Admin Dashboard Endpoints
    Route::namespace('Admin')->prefix('admin')->middleware(['auth:api','role:admin','admin_logs'])
        ->group(function (){

        //Flights Endpoints
        Route::group(['prefix' => 'flights'] , function (){

            Route::get('bookings/' , [
                'uses' => 'PNRController@index'
            ]);

            Route::patch('bookings/updateStatus/{booking_id}' , [
                'uses' => 'PNRController@updateStatus'
            ]);

            Route::post('bookings/cancel' , [
                'uses' => 'PNRController@cancel'
            ]);

            Route::get('bookings/statuses' , [
                'uses' => 'PNRController@statuses'
            ]);

            Route::get('bookings/{booking_id}' , [
                'uses' => 'PNRController@show'
            ]);

            Route::get('airlines/whitelist' , [
                'uses' => 'AirlineController@whiteListAirlines'
            ]);

            Route::get('airlines/blacklist' , [
                'uses' => 'AirlineController@blackListAirlines'
            ]);

            Route::post('airlines/block' , [
                'uses' => 'AirlineController@blockAirline'
            ]);

            Route::post('airlines/unblock' , [
                'uses' => 'AirlineController@unblockAirline'
            ]);

            Route::post('airlines/blockByCountry' , [
                'uses' => 'AirlineController@blockAirlinesByCountry'
            ]);

            Route::post('airlines/unblockByCountry' , [
                'uses' => 'AirlineController@unblockAirlinesByCountry'
            ]);

            Route::get('airlinesForCountry/{countryCode}' , [
                'uses' => 'AirlineController@airlinesForCountry'
            ]);

            Route::get('/airports/whitelist' , [
                'uses' => 'AirportController@whitelist'
            ]);

            Route::get('/airports/blacklist' , [
                'uses' => 'AirportController@blacklist'
            ]);

            Route::get('/airports/countries' , [
                'uses' => 'AirportController@countries'
            ]);

            Route::get('/airports/cities' , [
                'uses' => 'AirportController@cities'
            ]);

            Route::post('/airports/block' , [
                'uses' => 'AirportController@blockAirportByCode'
            ]);

            Route::post('/airports/unblock' , [
                'uses' => 'AirportController@unblockAirportByCode'
            ]);

            Route::post('/airports/blockCity' , [
                'uses' => 'AirportController@blockAirportByCity'
            ]);

            Route::post('/airports/unblockCity' , [
                'uses' => 'AirportController@unblockAirportByCity'
            ]);

            Route::post('/airports/blockCountry' , [
                'uses' => 'AirportController@blockAirportByCountry'
            ]);

            Route::post('/airports/unblockCountry' , [
                'uses' => 'AirportController@unblockAirportByCountry'
            ]);
        });
        // Finish Flights Endpoints

        //Settings Endpoints
        Route::group(['prefix' => 'settings'] , function (){
            Route::get('loyalty-program',[
                'uses' => 'SettingsController@loyaltyProgram',
            ]);

            Route::put('loyalty-program/{id}',[
                'uses' => 'SettingsController@updateLoyaltyProgram'
            ]);

            Route::get('third-party-accounts',[
                'uses' => 'SettingsController@thirdPartyAccounts'
            ]);

            Route::put('third-party-accounts/{id}' ,  [
                'uses' => 'SettingsController@updateThirdPartyAccount'
            ]);

            Route::get('profit-settings' , [
                'uses' => 'SettingsController@profitSettings'
            ]);

            Route::put('profit-settings/{id}' , [
                'uses' => 'SettingsController@updateProfitSettings'
            ]);

            Route::group(['prefix' => 'emails'] , function (){
                Route::get('/' , [
                    'uses' => 'SettingsController@emailSetting'
                ]);

                Route::put('/update/{id}' , [
                    'uses' => 'SettingsController@updateEmailSettings'
                ]);
            });
        });
        //Finish Settings Endpoints

        //users management endpoints

        Route::apiResource('users' , 'UserController');

        Route::group(['prefix' => 'users'] , function (){

            Route::patch('/{id}/updateRole' , [
                'uses' => 'UserController@updateRole'
            ]);

            Route::post('/{id}/block' , [
                'uses' => 'UserController@block'
            ]);

            Route::post('/{id}/unblock',[
               'uses' => 'UserController@unblock'
            ]);

        });
        Route::get('/roles' , [
            'uses' => 'UserController@roles'
        ]);
        //Finish user management endpoints

        Route::group(['prefix' => 'hotels'] , function (){

            Route::get('/bookings' , [
                'uses' => 'HotelController@index'
            ]);


            Route::get('/bookings/show/{booking_id}' , [
                'uses' => 'HotelController@show'
            ]);

            Route::patch('/bookings/{id}/updateStatus' , [
                'uses' => 'HotelController@updateStatus'
            ]);

            Route::get('/bookings/statuses' , [
                'uses' => 'HotelController@statuses'
            ]);

            Route::post('bookings/cancel' , [
                'uses' => 'HotelController@cancelBooking'
            ]);

            Route::get('/payment/statuses' , [
                'uses' => 'HotelController@paymentStatuses'
            ]);
        });

        //Cars Endpoints
        Route::group(['prefix' => 'cars'] , function (){

            Route::get('/' , [
                'uses' => 'CarController@index'
            ]);

            Route::get('bookings/show/{id}' , [
                'uses' => 'CarController@show'
            ]);

            Route::patch('bookings/updateStatus/{booking_id}' , [
                'uses' => 'CarController@updateStatus'
            ]);

            Route::get('/bookings/statuses' , [
                'uses' => 'CarController@statuses'
            ]);
        });
        // Finish Cars Endpoints

        //clients managements endpoints
        Route::apiResource('/clients' , 'ClientController');
        Route::patch('clients/{id}/updateBlock', [
            'uses' => 'ClientController@updateClientBlocking'
        ]);
        //Finish clients managements endpoints

        //Activity log management
        Route::group(['prefix' => 'activity'] , function (){
            Route::get('/logs' , [
                'uses' => 'ActivityLogController@index'
            ]);

            Route::get('/admins' , [
                'uses' => 'ActivityLogController@admins'
            ]);
        });
    });



