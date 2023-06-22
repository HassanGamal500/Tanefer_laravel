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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('payment', 'HomeController@payment');

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
