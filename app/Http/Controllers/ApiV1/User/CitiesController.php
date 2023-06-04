<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Models\DestinationCity;
use App\GDSIntegration\Tbo\CountryList;
use App\GDSIntegration\Tbo\DestinationCityList;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationCityResource;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function autocomplete(Request $request)
    {
        $term = $request->term;

        if(is_null($term)){
            return response()->json([]);
        }

        if(! is_null($request->code)){
            $city = DestinationCity::where('code',$request->code)->first();

            if(is_null($city)){
                return response()->json([]);
            }

            return response()->json(new DestinationCityResource($city));
        }

        $cities = DestinationCity::where('cityName','LIKE',strtolower($term).'%')
                                    ->orWhere('hotel_name','LIKE','%'.strtolower($term).'%')
                                    ->orWhere('countryName','LIKE',strtolower($term).'%')
                                    ->take(10)->get();


        return response()->json(DestinationCityResource::collection($cities));
    }
}
