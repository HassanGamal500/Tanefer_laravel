<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageCalculateTotalPriceRequest;
use App\Http\Resources\Admin\PackageActivityDetails;
use App\Http\Resources\Admin\PackageResource;
use App\Http\Resources\Admin\PackageResource as PackageDetailsResource;
use App\Models\AvailabilitiesTour;
use App\Models\Package;
use App\Models\PackageActivity;
use App\Models\PackageBookingadventrue;
use App\Models\PackageCity;
use App\Models\PackageCityTransportation;
use App\Models\PackageTransportation;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelRoomSeason;
use App\Models\PackageSlugHistory;
use App\Models\PricingTiersTour;
use App\Models\Cruise as CruiseModel;
use App\Models\CruiseChildrenPackage;
use App\Services\Packages\PackageTerPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use DateTime;

class PackageController extends Controller
{
    /**
     * data for trip home page
     **/
    public function index(Request $request){

        $tripsNumber = $request->trips_number ?? 6 ;
        $trip = Package::where('is_published', 1)->orderBy('price_per_person','asc')->take($tripsNumber)->get();

        return responseJson($request,PackageResource::collection( $trip ),'success');
    }

    public function topPackages()
    {
        $packages = Package::where('is_published', 1)->where('is_top', 1)->orderBy('rank','desc')->get();

        return responseJson(\request(),PackageResource::collection( $packages ),'success');
    }

    public function search(Request $request, $cityID = null )
    {

        $tripQuery = Package::query();
        if( $cityID ) {
            $tripQuery->whereHas('packageCity',function ($cityQuery) use ( $cityID ){
                $cityQuery->where('tour_city_id',$cityID);
            });
        }
        $trips = $tripQuery->where('is_published', 1)->orderByDesc('price_per_person')->get();

      return  responseJson($request, [
            'tripTotal'=> $trips->count(),
            'tripList'=> PackageResource::collection( $trips )
        ],'success');
    }

    public function details($term)
    {
        $trip = Package::where('slug',$term)->first();

        if(is_null($trip)){
            $trip = Package::find($term);
            if(is_null($trip)){
                $tripPackage = PackageSlugHistory::where('slug',$term)->first();
                if($tripPackage != null){
                    $trip = $tripPackage->package;
                    $prices = ['solo'=>$trip->solo_packageprice,'limo'=>$trip->Limo_packageprice,'hiac'=>$trip->HiAC_packageprice,'caster'=>$trip->Caster_packageprice
                        ,'bus'=>$trip->bus_packageprice,'children_percentage'=>$trip->children_percentage];
                    return responseJson(\request(),new PackageActivityDetails ( $trip ),'redirect to the correct package',
                        301,['prices' => $prices,'slug' => $trip->slug]);
                }else{
                    return responseJson(\request(), new \stdClass(),'Package Not found',404);
                }
            }
        }

        $prices = ['solo'=>$trip->solo_packageprice,'limo'=>$trip->Limo_packageprice,'hiac'=>$trip->HiAC_packageprice,'caster'=>$trip->Caster_packageprice
        ,'bus'=>$trip->bus_packageprice,'children_percentage'=>$trip->children_percentage];

        return responseJson(\request(),new PackageActivityDetails ( $trip ),'success',200,['prices' => $prices]);
    }

    public function childrenpolicy($packageid)
    {
        return responseJson(\request(),Package::where('id',$packageid)->first()->packageChildrenPolicies,'success');
    }

    public function calculateTotalPrice(PackageCalculateTotalPriceRequest $request)
    {
        $packageService = new \App\Services\Packages\Package();

        return responseJson($request,$packageService->calculateTotalPrice($request),'success');
    }

    // public function calculateAllPrice(Request $request)
    // {
    //     $adults = $request->adults ?? 0;
    //     $children = $request->children ?? 0;
    //     $adventure_id = $request->adventures ?? [];
    //     $package_id = $request->package_id;
    //     $date = $request->date;
    //     $totalOccupancy = $adults + $children;
    //     $availabilities = [];
    //     $totalPrice = 0;
    //     if ($adventure_id == null && $adventure_id == 'null') {
    //         return response()->json([
    //             'status' => 400,
    //             'errors' => 'No Data Available',
    //         ]);
    //     }
    //     if($date == null && $date == 'null') {
    //         return response()->json([
    //             'status' => 400,
    //             'errors' => 'Please Select Date',
    //         ]);
    //     }

    //     $listActivitiesByTime = PackageActivity::whereIn('id', $adventure_id)->orderBy('start_time', 'asc')->get();

    //     for ($i = 0; $i < count($listActivitiesByTime) - 1; $i++) {
    //         $current_activity = $listActivitiesByTime[$i];
    //         $next_activity = $listActivitiesByTime[$i + 1];

    //         $current_end_time = $current_activity->end_time;
    //         $next_start_time = $next_activity->start_time;
    //         if ($current_end_time >= $next_start_time) {
    //             return response()->json([
    //                 'errors' => 'Two adventures have the same time. Please select another one.',
    //                 'status' => 400
    //             ]);
    //         }
    //     }
    //     foreach($adventure_id as $adventure) {
    //         $packageActivityQuery = AvailabilitiesTour::where('from_date', '<=', $date)->where('to_date', '>=', $date)->where('package_activity_id',$adventure)->pluck('id');

    //         if (!$packageActivityQuery) {
    //             return response()->json([
    //                 'status' => 400,
    //                 'errors' => 'No Data Available For This Date',
    //             ]);
    //         }

    //         foreach($packageActivityQuery as $packageActivity) {
    //             $availability  = PricingTiersTour::where('package_activity_id', $adventure)->where('availabilities_tour_id', $packageActivity)->get();

    //             if ($availability->isNotEmpty()) {
    //                 $availabilities[] = $availability;
    //             } else {
    //                 return response()->json([
    //                     'status' => 400,
    //                     'errors' => 'No Tours Package Available',
    //                 ]);
    //             }
    //         }
    //     }
    //     $allIds = collect($availabilities)->flatten()->toArray();
    //     foreach ($allIds as $idd) {
    //         $doubleValuechild = $idd['child_percentage'] / 100.0;
    //         if($idd['max'] >= $totalOccupancy && $idd['min'] <= $totalOccupancy) {

    //             $totalAdultPrice = $idd['adult_price'] * $adults;

    //             $totalChildrenPrice = $children * $doubleValuechild * $idd['adult_price'];

    //             $totalPriceActivity = $totalAdultPrice + $totalChildrenPrice;

    //             $totalAdultPrice = isset($totalAdultPrice) ? $totalAdultPrice : 0;
    //             $totalChildrenPrice = isset($totalChildrenPrice) ? $totalChildrenPrice : 0;
    //             $totalPriceActivity = isset($totalPriceActivity) ? $totalPriceActivity : 0;

    //             $totalPrice += $totalPriceActivity;
    //         }
    //     }

    //     if($totalPrice != 0) {
    //         // get transportations
    //         $transportations = PackageCityTransportation::where('package_id', $package_id)->pluck('price_per_person')->sum();

    //         $transportations = $transportations * $totalOccupancy;
    //         // get cruise id
    //         $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');


    //         if($cruise_id != null) {
    //             // get price_per_day from cruise
    //             $cruisePrice = PackageHotelRoomSeason::whereIn('package_hotel_room_id', function ($query) use ($cruise_id) {
    //                 $query->select('id')
    //                     ->from(with(new PackageHotelRoom())->getTable())
    //                     ->whereIn('model_id', $cruise_id)
    //                     ->where('model_type', 'App\Models\Cruise');
    //             })
    //             ->pluck('price_per_day')
    //             ->sum();

    //             $cost = $totalPrice + $transportations +  $cruisePrice;
    //         } else {
    //             $cost = $totalPrice + $transportations ;
    //         }
    //         if ($cost != 0 && $cost != null) {
    //             $sessionId = Str::uuid()->toString();

    //             $cacheTotalPrice = ['totalPrice' => $cost];

    //             Cache::put($sessionId, $cacheTotalPrice, 12000);

    //             if($adventure_id == []) {
    //                 $cost = 0;
    //             }

    //             return response()->json([
    //                 'message' => 'Activity Prices',
    //                 'status' => 200,
    //                 'totalPrice' => $cost,
    //                 'sessionId' => $sessionId
    //             ]);

    //         } else {
    //             return response()->json([
    //                 'status' => 400,
    //                 'errors' => 'The number you have chosen is greater than the allowed number',
    //             ]);
    //         }

    //     } else {
    //         return response()->json([
    //             'message' => 'Activity Prices',
    //             'status' => 200,
    //             'totalPrice' => 0
    //         ]);
    //     }
    // }

    public function calculateAllPrice(Request $request)
    {
        $activities = $request->activities;
        $adults = $request->adults ?? 0;
        $children = $request->children ?? 0;
        // $adventure_id = $request->adventures ?? [];
        $package_id = $request->package_id;
        $date = $request->date;
        $totalOccupancy = $adults + $children;
        $availabilities = [];
        $totalPrice = 0;
        $childAges = $request->ages;
        $rooms = $request->rooms;

        if($adults == 0 && $adults == '0') {
            $packageTerPrice = new PackageTerPrice();
            
            // $transportations = PackageTransportation::where('package_id', $package_id)->min('price');
            // $transportationPrice = $transportations ? $transportations : 0;
                
            if($activities == null && $activities == 'null' && $activities == []) {
                $tierprice = $packageTerPrice->calculatetierPrice($package_id);
                return response()->json([
                    'message' => 'static tier price',
                    'status' => 200,
                    'totalPrice' => $tierprice
                ]);
            } else {
                $adventureIds = collect($activities)
                    ->flatMap(function ($activity) {
                        if(isset($activity['adventures'])) {
                            return $activity['adventures'];
                        } else {
                            return null;
                        }
                    })
                    ->toArray();
                $allprice = $packageTerPrice->calculatetierAdvPrice($package_id, $adventureIds, $date, $adults, $children, $childAges);
                
                return response()->json([
                    'message' => 'all tier price',
                    'status' => 200,
                    'totalPrice' => $allprice
                ]);

            }
        }
        
        foreach($activities as $activity) {
            $startFormatDay = $activity['startFormatDay'];

            if (isset($activity['adventures'])) {
                $adventures = $activity['adventures'];

                if ($adventures == null || $adventures == 'null' || count($adventures) == 0) {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'No Data Available',
                    ]);
                }

                if(!isset($startFormatDay) || empty($startFormatDay) || $startFormatDay == null || $startFormatDay == 'null') {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'Please Select Date',
                    ]);
                }

                // Check Duplicates on Adventures in this Date
                $temp_adventures = array_unique($adventures);
                $duplicates = sizeof($temp_adventures) != sizeof($adventures);

                if($duplicates) {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'You have already chosen it',
                    ]);
                }

                $listActivitiesByTime = PackageActivity::whereIn('id', $adventures)->orderBy('start_time', 'asc')->get();

                for ($i = 0; $i < count($listActivitiesByTime) - 1; $i++) {
                    $current_activity = $listActivitiesByTime[$i];
                    $next_activity = $listActivitiesByTime[$i + 1];

                    $current_end_time = $current_activity->end_time;
                    $next_start_time = $next_activity->start_time;
                    // if ($current_end_time >= $next_start_time) {
                    //     return response()->json([
                    //         'errors' => 'Two adventures have the same time on date ['.$startFormatDay.']. Please select another one.',
                    //         'status' => 400
                    //     ]);
                    // }
                }

                foreach($adventures as $adventure) {
                    $packageActivityQuery = AvailabilitiesTour::where('from_date', '<=', $startFormatDay)->where('to_date', '>=', $startFormatDay)->where('package_activity_id',$adventure)->pluck('id');

                    if (!$packageActivityQuery) {
                        return response()->json([
                            'status' => 400,
                            'errors' => 'No Data Available For This Date',
                        ]);
                    }

                    foreach($packageActivityQuery as $packageActivity) {
                        $availability = PricingTiersTour::where('availabilities_tour_id', $packageActivity)
                            ->where('package_activity_id', $adventure)
                            ->where('min', '<=', $adults)
                            ->where('max', '>=', $adults)
                            ->where(function($q) use ($children) {
                                if ($children == 0) {
                                    $q->where('max_child', '>=', $children);
                                    $q->orWhereNull('max_child', $children);
                                } else {
                                    $q->where('max_child', '>=', $children);
                                }
                            })
                            ->orderBy('min', 'asc')
                            ->get();
                        // $availability  = PricingTiersTour::where('package_activity_id', $adventure)->where('availabilities_tour_id', $packageActivity)->get();
                        if ($availability->isNotEmpty()) {
                            $availabilities[] = $availability[0];
                        } else {
                            return response()->json([
                                'status' => 400,
                                'errors' => 'No Tours Package Available'
                            ]);
                        }
                    }
                }

                $allIds = collect($availabilities)->flatten()->toArray();
            }
        }

        if(isset($allIds)){
            foreach ($allIds as $idd) {
                $doubleValuechild = $idd['child_percentage'] / 100.0;
                // if($idd['max'] >= $totalOccupancy && $idd['min'] <= $totalOccupancy) {
                if($idd['max'] >= $adults && $idd['min'] <= $adults) {

                    $totalAdultPrice = $idd['adult_price'] * $adults;

                    // $totalChildrenPrice = $children * $doubleValuechild * $idd['adult_price'];
                    
                    // $totalChildrenPrice = $idd['max_child'] >= $children ? ($children * $doubleValuechild * $idd['adult_price']) : 0;
                    
                    if($idd['max_child'] >= $children) {
                        $totalChildrenPrice = $children * $doubleValuechild * $idd['adult_price'];
                    } else {
                        return response()->json([
                            'status' => 400,
                            'errors' => 'Maximum number of children with ('.$idd['max'].') adults is ('.$idd['max_child'].')',
                        ]);
                    }

                    $totalPriceActivity = $totalAdultPrice + $totalChildrenPrice;

                    $totalAdultPrice = isset($totalAdultPrice) ? $totalAdultPrice : 0;
                    $totalChildrenPrice = isset($totalChildrenPrice) ? $totalChildrenPrice : 0;
                    $totalPriceActivity = isset($totalPriceActivity) ? $totalPriceActivity : 0;

                    $totalPrice += $totalPriceActivity;

                }

            }
        }

        if($totalPrice != 0) {
            // get transportations
            // $transportations = PackageCityTransportation::where('package_id', $package_id)->pluck('price_per_person')->sum();
            // return response()->json($totalPrice);
            if($adults == 0 && $adults == 0) {
                $transportations = PackageTransportation::where('package_id', $package_id)->min('price');
                $transportationPrice = $transportations;
            } else {
                $transportations = PackageTransportation::where('package_id', $package_id)
                    ->where('min', '<=', $totalOccupancy)
                    ->where('max', '>=', $totalOccupancy)
                    ->orderBy('price', 'ASC')
                    ->first();
                
                    
                $transportationPrice = $transportations ? $transportations->price : 0;
            }
            
            $transportations = $transportationPrice * $totalOccupancy;

            // // get cruise id
            // $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');


            // if($cruise_id != null) {
            //     // get price_per_day from cruise
            //     $cruisePrice = PackageHotelRoomSeason::whereIn('package_hotel_room_id', function ($query) use ($cruise_id) {
            //         $query->select('id')
            //             ->from(with(new PackageHotelRoom())->getTable())
            //             ->whereIn('model_id', $cruise_id)
            //             ->where('model_type', 'App\Models\Cruise');
            //     })
            //     ->pluck('price_per_day')
            //     ->sum();
            //     $cruisetotal = $cruisePrice * $totalOccupancy;

            //     $cost = $totalPrice + $transportations +  $cruisetotal;
            // } else {
            //     $cost = $totalPrice + $transportations ;
            // }
            
            // get cruise id
            $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');
            $cruisetotal = 0;
            
            if(isset($cruise_id) && $cruise_id && count($cruise_id) > 0) {
                $cruises = CruiseModel::whereIn('id', $cruise_id)->get();
                
                foreach ($cruises as $cruise) {
                    $adult_price = 0;
                    $child_price = 0;
                    $numberOfNights = $cruise->number_of_nights;
                    
                    foreach ($rooms as $room){
                        $cruise_room = PackageHotelRoom::select('package_hotel_rooms.id', 'max_num_adult', 'max_num_children', 'price_per_day')
                            ->leftJoin('package_hotel_room_seasons', function($join) {
                                $join->on('package_hotel_rooms.id', '=', 'package_hotel_room_seasons.package_hotel_room_id');
                            })
                            ->where('max_num_adult', '>=', $room['travellers'])
                            ->where('max_num_children', '>=', $room['children'])
                            ->where('model_id', $cruise->id)
                            ->where('start_date', '<=', $date)
                            ->where('end_date', '>=', $date)
                            ->orderBy('price_per_day', 'ASC')
                            ->first();

                        if($cruise_room) {
                            $maxAdultNumber = $cruise_room->max_num_adult;
                            $maxChildNumber = $cruise_room->max_num_children;
                            
                            if ($room['travellers'] <= $maxAdultNumber && $room['children'] <= $maxChildNumber) {
                                $cruise_price = PackageHotelRoomSeason::select('id', 'price_per_day', 'start_date', 'end_date')
                                    ->where('package_hotel_room_id', $cruise_room->id)
                                    ->where('start_date', '<=', $date)
                                    ->where('end_date', '>=', $date)
                                    ->orderBy('price_per_day', 'ASC')
                                    ->first();
                                    
                                // if (empty($cruise_price)) {
                                //     return response()->json([
                                //         'status' => 400,
                                //         'errors' => 'This Selected Date not allowed limit for the selected room.',
                                //     ]);
                                // }
                                
                                $adult_price += $cruise_price ? ($room['travellers'] * $cruise_price->price_per_day) : 0;
                                
                                if(isset($room['ages']) && count($room['ages']) > 0) {
                                    for($x = 0; $x < $children; $x++) {
                                        $children_cruise = CruiseChildrenPackage::where('cruise_id', $cruise->id)
                                            ->where('package_hotel_room_id', $cruise_room->id)
                                            ->where('min', '<=', $room['ages'][$x])
                                            ->where('max', '>=', $room['ages'][$x])
                                            ->orderBy('children_Percentage', 'ASC')
                                            ->first();
                                            
                                        // if (empty($children_cruise)) {
                                        //     return response()->json([
                                        //         'status' => 400,
                                        //         'errors' => 'This Children age not allowed limit for the selected room.',
                                        //     ]);
                                        // }
                                        
                                        $child_price += $children_cruise ? ($cruise_price->price_per_day * $children_cruise->children_Percentage / 100) : 0; // 120 * 10% = 12
                                    }
                                }
                            }
                        }
                    }
                    
                    $cruisetotal += ($adult_price + $child_price) * $numberOfNights;
                }

                $cost = $totalPrice + $transportations +  $cruisetotal;
            } else {
                $cost = $totalPrice + $transportations ;
            }



            if ($cost != 0 && $cost != null) {
                $sessionId = Str::uuid()->toString();
                $cacheTotalPrice = ['totalPrice' => $cost];
                Cache::put($sessionId, $cacheTotalPrice, 12000);

                // if($adventures == []) {
                //     $cost = 0;
                // }

                return response()->json([
                    'message' => 'Activity Prices',
                    'status' => 200,
                    'totalPrice' => $cost,
                    'sessionId' => $sessionId
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'errors' => 'The number you have chosen is greater than the allowed number',
                ]);
            }

        } else {
            return response()->json([
                'message' => 'Activity Prices',
                'status' => 200,
                'totalPrice' => 0
            ]);
        }

    }
}
