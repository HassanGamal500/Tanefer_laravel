<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightSearchRequest;
use App\Http\Requests\SendMailToBookRequest;
use App\Libs\FireBase\RealTimeNotification;
use App\Services\Flights\Flight;
use App\Services\Flights\FlightBooking;
use Illuminate\Support\Facades\Cache;

class FlightController extends Controller
{
    public function search(FlightSearchRequest $request)
    {
        $flight = new Flight();
        $flightResult = $flight->search($request);

        return response()->json($flightResult['data'], $flightResult['status']);
    }

    public function sendMailToBook(SendMailToBookRequest $request)
    {
        $flight = new FlightBooking();

        $result = $flight->sendMailToBook($request);

        return response()->json(['data' => $result['data'],'message' => $result['message']],$result['status']);
    }
}
