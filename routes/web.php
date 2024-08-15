<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Package;
use Illuminate\Support\Facades\Date;
use App\Mail\BookingConfirmation;
use App\Mail\NewBooking;
use Illuminate\Support\Str;
use App\Mail\BookingCruiseConfirmation;


//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::get('/clear/route', function () {
    Artisan::call('route:clear');
});
Route::get('/clear/cache', function () {
    Artisan::call('config:cache');
});

Route::get('/migrate', function(){
    \Artisan::call('migrate');
});
Route::get('/seed', function(){
    \Artisan::call('db:seed');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('payment', 'HomeController@payment');
Route::get('getPaymentPayFort', 'HomeController@getPayment');

Route::get('test' , function (){

    if(! file_exists(public_path('storage'))){
        \Illuminate\Support\Facades\File::link(storage_path('app/public'),public_path('storage'));
    }
    \Illuminate\Support\Facades\Cache::forget('clients-'.app()->environment());
});

//Route::get('test' , function (){

//    $generator = new \Wsdl2PhpGenerator\Generator();
//    $generator->generate(
//        new \Wsdl2PhpGenerator\Config(array(
//            'inputFile' => 'https://api.tbotechnology.in/HotelAPI_V7/HotelService.svc?wsdl',
//            'outputDir' => public_path('/tbo'),
//    ))
//);
//});