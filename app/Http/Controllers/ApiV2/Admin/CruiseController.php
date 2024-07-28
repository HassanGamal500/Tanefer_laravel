<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CruiseChildrenPolicy;
use App\Http\Requests\CruiseRequest;
use App\Http\Resources\Admin\PackageActivityDetails;
use App\Http\Resources\Admin\PackageHotelchildrenResource;
use App\Mail\BookingCruiseConfirmation;
use App\Mail\BookingCruiseRejection;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Cruise;
use App\Models\CruiseImage;
use App\Models\CruiseChildrenPackage;
use App\Models\PackageHotelRoomSeason;
use App\Models\PackageBookingData;
use App\Models\PackageActivity;
use App\Models\TourCity;
use App\Services\Packages\CruiseStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CruiseController extends Controller
{

    public function listOfCruises($cityId)
    {
        $cruises = Cruise::select('id','name')->whereHas('cities', function ($q) use ($cityId) {
            $q->where('tour_cities.id', $cityId)->where('cruise_tour_city.is_start',1);
        })->orderBy('sort', 'ASC')->get();

        return response()->json(['data' => $cruises]);
    }


    public function index(Request $request)
    {
        $rowPerPage = $request->row_per_page ?? 10;
        $cruiseQuery = Cruise::query();
        $cruiseQuery->orderBy('sort', 'ASC');
        $cruises = $cruiseQuery->paginate($rowPerPage);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> [
                'CruiseTotal'=> $cruises->total(),
                'CruiseList'=> $cruises
            ]
        ]);
    }

    public function show($id)
    {
        $cruise = Cruise::with(['images', 'rooms', 'cities'])->where('id', $id)->first();

        // Check if the Cruise model was found
        if (!$cruise) {
            return response()->json(['error' => 'Cruise not found'], 404);
        }

        // Populate the 'children' column in each 'room'
        foreach ($cruise->rooms as $room) {
            $childrenData = CruiseChildrenPackage::select('min', 'max', 'children_Percentage as percentage')
                ->where('cruise_id', $cruise->id)
                ->where('package_hotel_room_id', $room->id)
                ->get();
            // Add the 'children' column to the room and assign the data
            $room->childrentiers = $childrenData;
            
            $seasons = PackageHotelRoomSeason::select('package_hotel_season_id as id', 'price_per_day', 'start_date', 'end_date')
                ->where('package_hotel_room_id', $room->id)
                ->get();

            $room['package_hotel_room_season'] = $seasons;
        }

        // Return the data
        return [
            'cruise' => $cruise,
        ];
    }

    public function store(CruiseRequest $request) {
        $validated = $request->validated();
        DB::transaction(function () use ($validated) {
            $cruise = CruiseStoreService::storeCruiseData($validated, null);
            $cruise->cities()->attach($validated['start_city_id'], ['is_start' => 1]);
            $cruise->cities()->attach($validated['cities_ids']);

            if (array_key_exists('images', $validated)) {
                CruiseStoreService::storeCruiseImages($validated['images'], $cruise);
            }

            if (array_key_exists('rooms', $validated)) {
                $cruiseService = new CruiseStoreService();
                $cruise_id = CruiseStoreService::StoreCruiseRooms($validated['rooms'], $cruise);
                $cruiseService->storeChildrenData($validated['rooms'], $cruise->id, $cruise_id);
            }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function childrenPolicy(CruiseChildrenPolicy $request)
    {
        $validated = $request->validated();
        DB::transaction(function () use ($validated ) {
           CruiseStoreService::storeCruiseChildrenData($validated);
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function update(CruiseRequest  $request, $id)
    {
        // dd($request->all());
        $cruise = Cruise::findOrFail($id);
        $validated = $request->validated();
        // DB::transaction(function () use ( $cruise, $validated ,$request ) {

            $cruise->update( CruiseStoreService::collectCruiseData($validated, $cruise));
            // $cruise->cruiseChildrenPackage()->delete();
            // foreach ($validated['rooms'] as $room){
            //     $cruise_id = CruiseStoreService::UpdatePackageHotelRoomData($cruise,$room);
            //     // $cruise->packageHotelRoom()->delete();
            //     // $cruise_id = CruiseStoreService::StoreCruiseRooms($validated['rooms'], $cruise);
                
            //     // $cruiseService = new CruiseStoreService();
            //     // $cruiseService->storeChildrenData($validated['rooms'], $cruise->id, $cruise_id);
            // }
            
            if($request->master_image){
                CruiseStoreService::storeCruiseMasterimage($request->master_image, $cruise);
            }
            
            if($request->images){
                // CruiseStoreService::storeCruiseImages($request->images,$cruise);
                CruiseStoreService::createOrUpdateCruiseImages($request->images, $cruise);
            }
            
            if($request->rooms){
                $cruise->packageHotelRoom()->delete();
                $cruise->cruiseChildrenPackage()->delete();
                $cruiseService = new CruiseStoreService();
                $cruise_id = CruiseStoreService::StoreCruiseRooms($request->rooms, $cruise);
                $cruiseService->storeChildrenData($validated['rooms'], $cruise->id, $cruise_id);
            }

        // });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function removeImage($id)
    {
        $cruiseImage = CruiseImage::findOrFail($id);

        Storage::delete($cruiseImage->getAttributes()['image']);

        $cruiseImage->delete();

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }
    
    public function destroy(Cruise $cruise)
    {
        if( $cruise->delete() )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);
    }
    
    public function sendEmail(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'book_id' => 'required',
            'price' => 'required',
            'status' => 'required|in:accept,reject'
        ]);
        
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        
        $booking = Booking::with([
            'bookingCity', 'bookingPayment', 'bookingTraveler', 'bookingData',
            'startCity', 'endCity', 'package.packageCity'
        ])->where('id', $request->book_id)->first();
        
        if (is_null($booking)) {
            return response()->json(['message' => 'This booking was not found'], 404);
        }
        
        $getPackage = null;
        
        if($booking->package_id) {
            $trip = Package::where('id',$booking->package_id)->first();
            $booking->package = new PackageActivityDetails( $trip );
            $getPackage = new PackageActivityDetails( $trip );
        }
        
        $combinedList = [];
        $package_name = null;
        
        if($booking->model_type == 'App\Models\Cruise') {
            $cruise = Cruise::where('id', $booking->model_id)->first();
            $booking->cruise = $cruise;
        } else {
            if($checkHasCruise = $booking->package->packageCity->where('type', 'cruise')->first()) {
                $cruise = Cruise::where('id', $checkHasCruise->cruise_id)->first();
                $booking->cruise = $cruise;
            } else {
                $booking->cruise = null;
            }
            
            $package_data = PackageBookingData::select('adventrue_id', 'day_number', 'package_city_id','id')
                ->where('booking_id', $booking->id)
                ->whereNull('cruise_id')
                ->get();

            $package_data_cruise = PackageBookingData::select('cruise_id', 'day_number', 'package_city_id','id')
                ->where('booking_id', $booking->id)
                ->whereNotNull('cruise_id')
                ->get();

            $adventures = [];
            $cruises = [];
            $package_name = $booking->package->title;

            // Processing adventures
            foreach ($package_data as $advent) {
                $adventures_id = PackageActivity::where('id', $advent['adventrue_id'])->first();
                $package_city_id = TourCity::where('id', $advent['package_city_id'])->pluck('name')->first();

                if ($adventures_id) {
                    $adventure_id = $adventures_id;
                    $day_number = $advent['day_number'];

                    $adventures[] = [
                        'id'=> $advent->id,
                        'adventure_id' => $adventure_id,
                        'day_number' => $day_number,
                        'package_city_id' => $package_city_id,
                    ];
                } else {
                    $day_number = $advent['day_number'];
                    $adventures[] = [
                        'id'=> $advent->id,
                        'adventure_id' => 'null',
                        'day_number' => $day_number,
                        'package_city_id' => null,
                    ];
                }
            }

            // Processing cruises
            foreach ($package_data_cruise as $cruise) {
                $cruise_id = Cruise::where('id', $cruise['cruise_id'])->first();
                $package_city_id = TourCity::where('id', $cruise['package_city_id'])->pluck('name')->first();

                if ($cruise_id) {
                    $cruisee = $cruise_id;
                    $day_number = $cruise['day_number'];

                    $cruises[] = [
                        'id'=> $cruise->id,
                        'cruise_id' => $cruisee,
                        'day_number' => $day_number,
                        'package_city_id' => $package_city_id,
                    ];
                }
            }
            $combinedList = collect(array_merge($adventures, $cruises))->sortby('id');
        }

        $bookId = $booking->id;
        $price = $booking->total_price;
        $username = $booking->bookingData->contact_name;
        $email = $booking->bookingData->contact_email;
        $cruiseData = $booking->cruise;
        $startDate = $booking->start_date;
        
        
        if($request->status == 'accept') {
            // return response()->json($cruiseData);
            Mail::to($email)->send(new BookingCruiseConfirmation($bookId, $price, $username, $email, $cruiseData, $startDate, null, $combinedList, $booking, $package_name));
            
            return responseJson(request(), $booking, 'Email send to you with confirmation booking cruise link');
        } else {
            $updateBooking = Booking::where('id', $request->book_id)->update(['status' => 'Rejected']);
            
            Mail::to($email)->send(new BookingCruiseRejection($bookId, $price, $username, $email, $cruiseData, $startDate));
            
            return responseJson(request(), $booking, 'Email send to you with rejection booking');
        }
    }
}
