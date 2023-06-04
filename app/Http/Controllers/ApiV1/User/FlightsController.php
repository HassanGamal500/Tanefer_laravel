<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Http\Requests\FlightSearchRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetOneFlightRequest;
use App\Services\Flights\Flight;

class FlightsController extends Controller
{

    public function search(FlightSearchRequest $request)
    {
        $flight = new Flight();
        $flightResult = $flight->search($request);

        $status = $flightResult['status'] == 200 ? true : false;

        return apiResponse($flightResult['data'],$flightResult['message'],$status);
    }

    public function show(GetOneFlightRequest $request)
    {
        $flight = new Flight();

        $show = $flight->show($request);

        $status = $show['status'] != 200 ? false : true;

        return apiResponse($show['data'],$show['message'] ?? '',$status);
    }

    public function flightsPromotions()
    {
        $flight = new Flight();

        return apiResponse($flight->flightsPromotions(),'',true);
    }

}
