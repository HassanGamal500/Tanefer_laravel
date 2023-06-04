<?php

namespace App\Http\Controllers\ApiV1\User;


use App\GDSIntegration\Tbo\AvailableHotelRooms\AvailableHotelRooms;
use App\Http\Controllers\Controller;
use App\Http\Requests\AvailabilityAndPricingRequest;
use App\Http\Requests\HotelSearchRequest;
use App\Http\Requests\ShowAvailableRoomsRequest;
use App\Http\Requests\ShowHotelRequest;
use App\Services\Hotels\Hotel;

class HotelsController extends Controller
{
    public function search(HotelSearchRequest $request)
    {
        $hotel = new Hotel();

        $search = $hotel->search($request);
        $status = $search['status'] == 200 ? true : false;
        return apiResponse($search['data'],$search['message'],$status);
    }

    public function show(ShowHotelRequest $request)
    {
        $hotel = new Hotel();
        $show = $hotel->show($request);

        $status = $show['status'] == 200 ? true : false;

        return apiResponse($show['data'],$show['message'],$status);
    }

    public function roomsAvailability(ShowAvailableRoomsRequest $request)
    {
        $availableHotelRooms = new AvailableHotelRooms();
        $response = $availableHotelRooms->roomsResponse($request);

        if(!is_array($response)){
            return apiResponse([],$response,false);
        }

        return apiResponse($response,'list Hotel Rooms',true);
    }

    public function roomsAvailabilityAndPricing(AvailabilityAndPricingRequest $request)
    {
        $hotel = new Hotel();
        $availability = $hotel->availabilityAndPricing($request);

        $status = $availability['status'] == 200 ? true : false;

        return apiResponse($availability['data'],$availability['message'],$status);
    }




}
