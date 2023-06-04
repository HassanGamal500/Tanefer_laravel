<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Requests\BlockingAirportByCityRequest;
use App\Http\Requests\BlockingAirportByCountryRequest;
use App\Http\Requests\BlockingAirportRequest;
use App\Http\Resources\AirportCitiesAndCountriesResource;
use App\Models\Airport;
use App\Http\Resources\AirportResource;

class AirportController extends AdminController
{
    public function whitelist()
    {
        $airports = Airport::where('blacklisted',0)->get();

        return apiResponse(AirportResource::collection($airports),'list whitelist airports',true);
    }

    public function blacklist()
    {
        $airports = Airport::where('blacklisted',1)->get();

        return apiResponse(AirportResource::collection($airports),'list Blacklist Airports', true);
    }

    public function countries()
    {
        $countries = Airport::select('countryName','country')
            ->where('countryName','!=',null)->get();
        $countriesList = AirportCitiesAndCountriesResource::collection(
            $countries->unique('countryName'));

        return apiResponse($countriesList,'',true);
    }

    public function cities()
    {
        $cities = Airport::select('city','country')->get();

        return apiResponse(AirportCitiesAndCountriesResource::collection($cities),'',true);
    }

    public function blockAirportByCode(BlockingAirportRequest $request)
    {
        $airport = Airport::where('code',$request->code)->first();

        if (is_null($airport)){
            return apiResponse([],'This airport not found',false);
        }

        $airport->update(['blacklisted' => 1]);

        $airports = Airport::where('blacklisted',1)->get();

        return apiResponse(['blacklist' => AirportResource::collection($airports)],'Airport Blocked',true);
    }

    public function unblockAirportByCode(BlockingAirportRequest $request)
    {
        $airport = Airport::where('code',$request->code)->first();

        if (is_null($airport)){
            return apiResponse([],'This airport not found',false);
        }

        $airport->update(['blacklisted' => 0]);

        $airports = Airport::where('blacklisted',0)->get();

        return apiResponse(['whitelist' => AirportResource::collection($airports)],'Airport unblocked',true);
    }

    public function blockAirportByCity(BlockingAirportByCityRequest $request)
    {
        $airports = Airport::where('city' , $request->city)
            ->where('country',$request->country)
            ->get();

        $airportsList = Airport::where('blacklisted',1)->get();
        if(count($airports) == 0){
            return apiResponse($airportsList , 'No Airports found for this city',false);
        }
        foreach ($airports as $airport){
            $airport->update(['blacklisted' => 1]);
        }

        $airports = Airport::where('blacklisted',1)->get();

        return apiResponse(['blacklist' => AirportResource::collection($airports)],'City Blocked',true);
    }

    public function unblockAirportByCity(BlockingAirportByCityRequest $request)
    {
        $airports = Airport::where('city' , $request->city)
            ->where('country',$request->country)->get();

        $airportsList = Airport::where('blacklisted',0)->get();
        if(count($airports) == 0){
            return apiResponse($airportsList , 'No Airports found for this city',false);
        }
        foreach ($airports as $airport){
            $airport->update(['blacklisted' => 0]);
        }

        $airports = Airport::where('blacklisted',0)->get();

        return apiResponse(['whitelist' => AirportResource::collection($airports)],'City unblocked',true);
    }

    public function blockAirportByCountry(BlockingAirportByCountryRequest $request)
    {
        $airports = Airport::where('countryName', $request->countryName)->get();

        $airportsList = Airport::where('blacklisted',1)->get();
        if(count($airports) == 0){
            return apiResponse($airportsList, 'No Airports Found for this country',false);
        }

        foreach ($airports as $airport){
            $airport->update(['blacklisted' => 1]);
        }

        $airports = Airport::where('blacklisted',1)->get();

        return apiResponse(['blacklist' => AirportResource::collection($airports)],'Country Blocked',true);
    }

    public function unblockAirportByCountry(BlockingAirportByCountryRequest $request)
    {
        $airports = Airport::where('countryName', $request->countryName)->get();

        $airportsList = Airport::where('blacklisted',0)->get();
        if(count($airports) == 0){
            return apiResponse($airportsList, 'No Airports Found for this country',false);
        }

        foreach ($airports as $airport){
            $airport->update(['blacklisted' => 0]);
        }

        $airports = Airport::where('blacklisted',0)->get();

        return apiResponse(['whitelist' => AirportResource::collection($airports)],'Country unblocked',true);
    }
}
