<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripsController extends Controller
{
//    public function storeFromJson()
//    {
//        $trips = json_decode(file_get_contents(public_path('trips.json')));
//
//        foreach ($trips as $trip){
//            Trip::create([
//                'title' => str_replace('-',' ',$trip->post_title),
//                'image' => $trip->post_thumbnail,
//                'destination' => $trip->destination
//            ]);
//        }
//        return 'Success';
//    }

    public function index()
    {
        $trips = Trip::all();

        return apiResponse($trips,'all Trips',true);
    }

    public function tripsInHome($numberOfTrips)
    {
        $trips = Trip::take($numberOfTrips)->inRandomOrder()->get();

        return apiResponse($trips,'all trips',true);
    }
}
