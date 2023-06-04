<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Requests\BlockAirlineByCountryRequest;
use App\Http\Requests\BlockingAirlineRequest;
use App\Http\Requests\UnblockAirlineByCountryRequest;
use App\Models\Airline;
use App\Http\Resources\AirlineResource;
use App\Models\ExcludeAirline;

class AirlineController extends AdminController
{
    public function whiteListAirlines()
    {
        $airlines = Airline::where('blacklisted',0)->get();

        return apiResponse(AirlineResource::collection($airlines),'',true);
    }

    public function blackListAirlines()
    {
        $airlines = Airline::where('blacklisted',1)->get();

        return apiResponse(AirlineResource::collection($airlines),'',true);
    }

    public function blockAirline(BlockingAirlineRequest $request)
    {
        $airline = Airline::where('airline_code',$request->code)->first();
        $airline->update(['blacklisted' => 1]);

        $airlines = Airline::where('blacklisted',1)->get();

        return apiResponse(['blacklist'=>AirlineResource::collection($airlines)],'',true);
    }

    public function unblockAirline(BlockingAirlineRequest $request)
    {
        $airline = Airline::where('airline_code',$request->code)->first();
        $airline->update(['blacklisted' => 0]);

        $airlines = Airline::where('blacklisted',0)->get();

        return apiResponse(['whitelist'=>AirlineResource::collection($airlines)],'',true);
    }

    public function airlinesForCountry($countryCode)
    {
        $blacklistAirportsCodes = array_column(ExcludeAirline::select('airline_code')
            ->where('country_code',strtoupper($countryCode))
            ->get()->toArray(),'airline_code');

        $whiteListAirlinesByCountry = AirlineResource::collection(Airline::whereNotIn('airline_code',$blacklistAirportsCodes)->get());
        $blacklistAirportsByCountry = AirlineResource::collection(Airline::whereIn('airline_code',$blacklistAirportsCodes)->get());

        return apiResponse([
            'blackList' => $blacklistAirportsByCountry,
            'whiteList' => $whiteListAirlinesByCountry
        ],'',true);
    }

    public function blockAirlinesByCountry(BlockAirlineByCountryRequest $request)
    {
        foreach ($request->airlines_codes as $code){
            ExcludeAirline::create([
                'airline_code' => strtoupper($code),
                'country_code' => strtoupper($request->country_code)
            ]);
        }

        $blacklistAirportsCodes = array_column(ExcludeAirline::select('airline_code')->where('country_code',$request->country_code)
            ->get()->toArray(),'airline_code');

        $whiteListAirlinesByCountry = AirlineResource::collection(Airline::whereNotIn('airline_code',$blacklistAirportsCodes)->get());
        $blacklistAirportsByCountry = AirlineResource::collection(Airline::whereIn('airline_code',$blacklistAirportsCodes)->get());

        return apiResponse([
          'blackList' => $blacklistAirportsByCountry,
          'whiteList' => $whiteListAirlinesByCountry
        ],'',true);

    }

    public function unblockAirlinesByCountry(UnblockAirlineByCountryRequest $request)
    {
        ExcludeAirline::where('country_code',$request->country_code)
            ->whereIn('airline_code',$request->airlines_codes)->delete();

        $blacklistAirportsCodes = array_column(ExcludeAirline::select('airline_code')
            ->where('country_code',$request->country_code)
            ->get()->toArray(),'airline_code');
        $whiteListAirlinesByCountry = AirlineResource::collection(Airline::whereNotIn('airline_code',$blacklistAirportsCodes)->get());
        $blacklistAirportsByCountry = AirlineResource::collection(Airline::whereIn('airline_code',$blacklistAirportsCodes)->get());

        return apiResponse([
            'blackList' => $blacklistAirportsByCountry,
            'whiteList' => $whiteListAirlinesByCountry
        ],'',true);
    }
}
