<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingCruiseRequest;
use App\Http\Requests\CruiseCalculatePrice;
use App\Http\Resources\CruiseResource;
use App\Http\Resources\CruiseRoomResource;
use App\Models\Cruise as CruiseModel;
use App\Services\Packages\Cruise;
use App\Models\PackageHotelRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CruiseController extends Controller
{
    public function index()
    {
        $rowPerPage = \request()->row_per_page ?? 10;

        $cruiseQuery = Cruise::search(\request());

        $cruises = $cruiseQuery->with('images')->paginate($rowPerPage);

        return responseJson(\request(), [
            'cruiseTotal' => $cruises->total(),
            'cruiseList' => CruiseResource::collection($cruises),
        ], 'success');
    }

    public function show($id)
    {
        return new CruiseResource(CruiseModel::with(['rooms', 'cities'])->where('id', $id)->firstOrFail());
    }

    public function availability($id,Request $request)
    {
        $cruise = CruiseModel::findOrFail($id);

        $roomGuests = [];
        $i = 1;
        foreach ($request->roomGuests as $roomGuest){
            $rooms = $cruise->rooms()->whereHas('packageHotelRoomSeason', function ($q) use ($request) {
                $q->where('start_date', '<=', $request->start_date);
            })->where('max_num_adult', '>=', $roomGuest['adults'])
                ->where('max_num_children', '>=', $roomGuest['children'])
                ->get()->each(function ($item) use ($i) {
                return $item->room_number = $i;
            });

            $roomGuests[] = ['room_'.$i => CruiseRoomResource::collection($rooms)];

            $i++;
        }

        $availability = Arr::where($roomGuests,function ($value,$key){
            return current(array_values($value))->count() == 0;
        });

        if(count($availability) > 0){
            return [];
        }

        return $roomGuests;
    }

    public function calculatePrice($id, CruiseCalculatePrice $request)
    {
        CruiseModel::findOrFail($id);

        $rooms = [];
        $totalPrice = 0;
        foreach ($request->rooms as $room) {
            $cruiseRoom = PackageHotelRoom::findOrFail($room['room_id']);
            $price = $cruiseRoom->packageHotelRoomSeason()->where('start_date', '<=',$request->start_date)->first()->price_per_day ?? 0;
            $cruiseRoom->price_per_day = $price;
            if($request->children){
                $cruiseRoom->total_price = $price * $room['quantity'] * $request->adults * $request->children;
            }else{
                $cruiseRoom->total_price = $price * $room['quantity'] * $request->adults;
            }
            $totalPrice += $cruiseRoom->total_price;
            $rooms[] = $cruiseRoom;
        }
        $sessionId = Str::uuid()->toString();
        Cache::put($sessionId,['rooms' => $rooms,'totalPrice' => $totalPrice],1200);

        return ['session_id' => $sessionId, 'rooms' => $rooms,'totalPrice' => $totalPrice];
    }

    public function book($id,BookingCruiseRequest $request)
    {
        $cruise = CruiseModel::findOrFail($id);
        $cachedData = Cache::get($request->session_id);
        if(! $cachedData){
            return responseJson($request,'','Cannot complete booking',400);
        }

        $validatedData = $request->validated();

        $booking = Cruise::bookingCruise($validatedData,$cruise,$cachedData);
        Cruise::bookingData($validatedData,$booking);
        Cruise::BookingTravellers($validatedData,$booking);
        Cruise::storeBookingRooms($cachedData,$booking);

        return  responseJson($request,['booking_id'=>$booking->id],'operation done successfully');
    }
}
