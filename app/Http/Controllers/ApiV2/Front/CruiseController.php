<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingCruiseRequest;
use App\Http\Requests\RoomCalculatePriceRequest;
use App\Http\Requests\CruiseCalculatePrice;
use App\Http\Resources\CruiseResource;
use App\Http\Resources\CruiseRoomResource;
use App\Models\Cruise as CruiseModel;
use App\Models\CruiseChildrenPackage;
use App\Services\Packages\Cruise;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelRoomSeason;
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


    public function select_room_calculatePrice($id, RoomCalculatePriceRequest $request)
    {
        $validatedData = $request->validated();
        $allTotalPrices = 0;
        $data = '';
        $date = $validatedData['date'];
        $sessons = $validatedData['sesson'];

        $adult_price = 0;
        $child_price = 0;

        $cruise = CruiseModel::findOrFail($id);

        // max adult = 3
        // max child = 3
        // price = 120
        // sessons = rooms
        // 1 -3 => 10%
        // 4 - 6 => 18%

        if($cruise) {
            $numberOfNights = $cruise->number_of_nights;

            foreach ($sessons as $sesson) {
                $cruise_room = PackageHotelRoom::select('id', 'max_num_adult', 'max_num_children')
                    ->where('max_num_adult', '>=', $sesson['adult'])
                    ->where('max_num_children', '>=', $sesson['child'])
                    ->where('model_id', $id)
                    ->first();

                if($cruise_room) {
                    $maxAdultNumber = $cruise_room->max_num_adult;
                    $maxChildNumber = $cruise_room->max_num_children;

                    if ($sesson['adult'] <= $maxAdultNumber && $sesson['child'] <= $maxChildNumber) {
                        $cruise_price = PackageHotelRoomSeason::select('id', 'price_per_day', 'start_date', 'end_date')
                            ->where('package_hotel_room_id', $cruise_room->id)
                            ->where('start_date', '<=', $date)
                            ->where('end_date', '>=', $date)
                            ->orderBy('price_per_day', 'ASC')
                            ->first();

                        if (empty($cruise_price)) {
                            return response()->json([
                                'status' => 400,
                                'errors' => 'This Selected Date not allowed limit for the selected room.',
                            ]);
                        }

                        $adult_price += $sesson['adult'] * $cruise_price->price_per_day;

                        if(isset($sesson['child_ages']) && count($sesson['child_ages']) > 0) {
                            foreach($sesson['child_ages'] as $age) {
                                $children_cruise = CruiseChildrenPackage::where('cruise_id', $id)
                                    ->where('package_hotel_room_id', $cruise_room->id)
                                    ->where('min', '<=', $age['age'])
                                    ->where('max', '>=', $age['age'])
                                    ->orderBy('children_Percentage', 'ASC')
                                    ->first();

                                if (empty($children_cruise)) {
                                    return response()->json([
                                        'status' => 400,
                                        'errors' => 'This Children age not allowed limit for the selected room.',
                                    ]);
                                }

                                $child_price += $cruise_price->price_per_day * $children_cruise->children_Percentage / 100; // 120 * 10% = 12
                            }
                        }
                    }
                } else {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'Adult or Children Count Not Allowed Limit',
                    ]);
                }
            }

            $allTotalPrices = ($adult_price + $child_price) * $numberOfNights;
        }

        $successResponse = [
            'status' => 200,
            'message' => 'Calculation successful.',
            'total_price' => (string)round($allTotalPrices, 2),
        ];

        return response()->json($successResponse);
    }
}
