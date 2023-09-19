<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourCityResource;
use App\Models\Package;

class FilterController extends Controller
{
    /**
     * filter data for trip filter
     **/
    public function  index($cityId)
    {
        $tripQuery = Package::query();
        if( $cityId ) {
            $tripQuery->whereHas('packageCity',function ($cityQuery) use ( $cityId ){
                $cityQuery->where('tour_city_id',$cityId)->where('start',1);
            });
        }
        $packageCities = $tripQuery->first()->packageCities ?? [];
        $packages = $tripQuery->get();
        for($i = 1; $i < count($packages); $i++){
            $packageCities->push($packages[$i]->packageCities);
        }

        $tripDurations = $tripQuery->select(['duration'])->get();
        // $prices = [
        //     'min' => $tripQuery->min('expected_price'),
        //     'max' => $tripQuery->max('expected_price')
        // ];
        $tripLength = [];
        $durationsArray = Package::pluck('duration')->toArray();
        rsort($durationsArray);
        foreach ($tripDurations as $tripDuration){
            $tripLength[]['duration'] = $durationsArray[0];
        }

        return responseJson(request(),[
            'cities'        => TourCityResource::collection( $packageCities ) ,
            // 'prices'        => $prices,
            'tripLength'    => $tripLength
        ],'success');
    }
}
