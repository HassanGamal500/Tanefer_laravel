<?php

namespace App\Http\Controllers\ApiV2\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function getCities()
    {
        if(request()->type == 'cruise'){
            $cities = PackageActivity::where('activity_type','cruise')->get()->map->tourCity->flatten()->unique();
        }else{
            $cities = TourCity::all();
        }
        return response()->json([
            'cities' => TourCityResource::collection($cities),'message' => 'cities Fetched Successfully',"errors" => []
        ]);

    }
}
