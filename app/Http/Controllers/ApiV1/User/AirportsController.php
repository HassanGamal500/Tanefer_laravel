<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Jobs\SaveAutocompleteTerm;
use App\Models\Airline;
use App\Models\Airport;
use App\GDSIntegration\Sabre\GeoAutoComplete;
use App\Http\Controllers\Controller;
use App\Http\Resources\AirportResource;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class AirportsController extends Controller
{
    public function autocomplete(Request $request)
    {
        //        $airports  = Airport::all();
//        foreach ($airports as $airport){
//            Cache::forever($airport->code,$airport);
//        }
        //fetch term from query string.
        $term = $request->term;

        if(is_null($term)){
            return response()->json([]);
        }
//        if(Cache::has(strtoupper($term))){
//            $airports[] =  Cache::get(strtoupper($term));
//            return response()->json(AirportResource::collection($airports));
//        }

        //  $airports = Airport::with('airports')->where('code','LIKE',strtoupper($term).'%')->get();

        $airports = Airport::where('code','LIKE',$term.'%')
            ->orWhere('name','LIKE',$term.'%')->orWhere('city','LIKE',$term.'%')
            ->where('availability',1)->where('blacklisted',0)->take(15)->get();


        //  dispatch(new SaveAutocompleteTerm($term))->delay(now()->addSeconds(5));

        return response()->json(AirportResource::collection($airports));
    }



    public function airlinesLogo()
    {
//        $airlines = Airline::all();
//
//        foreach ($airlines as $airline){
//            try{
//                if(! file_exists(storage_path('app/public/airlines/'.$airline->airline_code.'.png'))){
//                    $url = 'http://pics.avs.io/170/65/'.$airline->airline_code.'.png';
//                    $contents = file_get_contents($url);
//                    Storage::put('airlines/'.$airline->airline_code.'.png', $contents);
//                }
//            }catch (\Exception $e){
//
//            }
//
//        }

        return 'success';
    }

    public function addCitiesForExistingAirports()
    {
        $airport = Airport::where('city_code',null)->first();

        if(is_null($airport)){
            return;
        }

        $availableAirports = Airport::where('availability',1)->where('blacklisted',0)->get();

        foreach ($availableAirports as $airport){
            $geoAutocomplete = new GeoAutoComplete();
            $geoAutocomplete->getResponse($airport->code);
        }
    }

}
