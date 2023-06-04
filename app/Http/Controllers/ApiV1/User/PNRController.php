<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PnrRequest;
use App\Services\Flights\FlightBooking;

class PNRController extends Controller
{

    public function create(PnrRequest $request)
    {
        $flightBooking = new FlightBooking();

        $create = $flightBooking->create($request);

        $status = $create['status'] == 200 ? true : false;

        return apiResponse($create['data'],$create['message'],$status);
    }

    public function show($pnr)
    {
        $flightBooking = new FlightBooking();

        $show = $flightBooking->show($pnr);

        $status = $show['status'] == 200 ? true : false;

        return apiResponse($show['data'],$show['message'],$status);
    }



}
