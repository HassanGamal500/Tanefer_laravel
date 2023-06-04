<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourCityResource;
use App\Models\PackageCityActivity;
use App\Models\TourCity;

class CityController extends Controller
{
    public function index()
    {
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> TourCityResource::collection( TourCity::all() )
        ]);

    }
}
