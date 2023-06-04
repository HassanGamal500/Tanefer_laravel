<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarBookRequest;
use App\Http\Requests\CarSearchRequest;
use App\Services\Cars\Car;
use App\Services\Cars\CarBooking;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function search(CarSearchRequest $request)
    {
        $car = new Car();
        $search = $car->search($request);

        $status = $search['status'] == 200 ? true : false;

        return apiResponse($search['data'],$search['message'],$status);
    }

    public function show(Request $request)
    {
        //TODO Validation
        $car = new Car();
        $show = $car->show($request);

        $status = $show['status'] == 200 ? true : false;

        return apiResponse($show['data'],$show['message'],$status);
    }


    public function book(CarBookRequest $request)
    {
        $carBooking = new CarBooking();
        $booking = $carBooking->create($request);

        $status = $booking['status'] == 200 ? true : false;

        return apiResponse($booking['data'],$booking['message'],$status);
    }



}
