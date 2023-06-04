<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\GDSIntegration\Sabre\AirlineLookUp;
use App\Http\Controllers\Controller;
use App\Http\Resources\AirlineResource;
use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function autocomplete(Request $request)
    {
        //fetch term from query string.
        $term = $request->term;

        if(is_null($term)){
            return response()->json([]);
        }

        if(auth()->guard('api')->check()){
            $airlines = Airline::where('airline_code','LIKE',strtoupper($term).'%')
                ->orWhere('airline_name','LIKE','%'.$term.'%')->take(10)->get();
        }else{
            $airlines = Airline::where('airline_code','LIKE',strtoupper($term).'%')
                ->orWhere('airline_name','LIKE','%'.$term.'%')->where('blacklisted',0)
                ->take(10)->get();
        }




        //  dispatch(new SaveAutocompleteTerm($term))->delay(now()->addSeconds(5));
        if(count($airlines) == 0){
            $airlineLookUp = new AirlineLookUp();
            try {
                $airlines = $airlineLookUp->getResponse($term);
            }catch (\Exception $e){
                $airlines = [];
                return response()->json($airlines,204);
            }
        }

        return response()->json(AirlineResource::collection($airlines));
    }
}
