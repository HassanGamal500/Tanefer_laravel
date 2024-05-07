<?php
namespace App\Services\Packages;
use App\Models\PackageBookingadventrue;
use App\Models\PackageCity;
use App\Models\PackageCityTransportation;
use App\Models\PackageTransportation;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelRoomSeason;
use App\Models\PricingTiersTour;
use App\Models\Cruise as CruiseModel;
use App\Models\CruiseChildrenPackage;
use Illuminate\Support\Facades\DB;

class PackageTerPrice {
    public function calculatetierPrice($package_id) {
        // get adventures ids from the package list
        $adventures  = PackageBookingadventrue::where('package_id', $package_id)->pluck('adventrue_id');
        $sum_prices = 0;
        foreach($adventures as $adventure) {
            $prices = PricingTiersTour::where('package_activity_id', $adventure)->groupBy('package_activity_id')->select(DB::raw('MIN(adult_price) as min_price') ,'package_activity_id')->first();

            $sum_prices += $prices ? $prices->min_price : 0;
        }


        // get transportations
        // $transportations = PackageCityTransportation::where('package_id', $package_id)->pluck('price_per_person')->sum();
        $transportations = PackageTransportation::where('package_id', $package_id)->min('price');
        $transportationPrice = $transportations ? $transportations : 0;

        // get cruise id
        $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');

        if($cruise_id != null) {
            // get price_per_day from cruise
            // $cruisePrice = PackageHotelRoomSeason::whereIn('package_hotel_room_id', function ($query) use ($cruise_id) {
            //     $query->select('id')
            //         ->from(with(new PackageHotelRoom())->getTable())
            //         ->whereIn('model_id', $cruise_id)
            //         ->where('model_type', 'App\Models\Cruise')
            //         ->where('max_num_adult', '>=', 1)
            //         ->where('max_num_children', '>=', 0);
            // })
            // ->pluck('price_per_day')
            // ->min();
            // $cost = $sum_prices + $transportationPrice +  $cruisePrice;
            
            $cruisetotal = 0;
            
            $cruises = CruiseModel::whereIn('id', $cruise_id)->get();
                
            foreach ($cruises as $cruise) {
                $adult_price = 0;
                $child_price = 0;
                $numberOfNights = $cruise->number_of_nights;
                
                $cruise_room = PackageHotelRoom::select('package_hotel_rooms.id', 'max_num_adult', 'max_num_children', 'price_per_day')
                    ->leftJoin('package_hotel_room_seasons', function($join) {
                        $join->on('package_hotel_rooms.id', '=', 'package_hotel_room_seasons.package_hotel_room_id');
                    })
                    ->where('max_num_adult', '>=', 1)
                    ->where('max_num_children', '>=', 0)
                    ->where('model_id', $cruise->id)
                    ->orderBy('price_per_day', 'ASC')
                    ->first();

                if($cruise_room) {
                    $maxAdultNumber = $cruise_room->max_num_adult;
                    $maxChildNumber = $cruise_room->max_num_children;
                    
                    $cruise_price = PackageHotelRoomSeason::select('id', 'price_per_day', 'start_date', 'end_date')
                        ->where('package_hotel_room_id', $cruise_room->id)
                        ->orderBy('price_per_day', 'ASC')
                        ->first();
                        
                    $adult_price += $cruise_price->price_per_day;
                }
                
                $cruisetotal += ($adult_price + $child_price) * $numberOfNights;
            }

            $cost = $sum_prices + $transportationPrice +  $cruisetotal;
        } else {
            $cost = $sum_prices + $transportationPrice ;
        }

        return $cost;
    }


    public function calculatetierAdvPrice ($package_id, $adventrue_id, $date = null, $adults = 0, $children = 0, $childAges = null) {
        // get adventures ids from the package list
        // $adventures  = PackageBookingadventrue::where('package_id', $package_id)->wherein('adventrue_id', $adventrue_id)->pluck('adventrue_id');
        // dd($adventures);
        $sum_prices = 0;
        foreach($adventrue_id as $adventure) {
            $prices = PricingTiersTour::where('package_activity_id', $adventure)->groupBy('package_activity_id')->select(DB::raw('MIN(adult_price) as min_price') ,'package_activity_id')->first();

            $sum_prices += $prices ? $prices->min_price : 0;
        }
        // get transportations
        // $transportations = PackageCityTransportation::where('package_id', $package_id)->pluck('price_per_person')->sum();
        $transportations = PackageTransportation::where('package_id', $package_id)->min('price');
        $transportationPrice = $transportations ? $transportations : 0;

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
        //     ->min();
        //     $cost = $sum_prices + $transportations +  $cruisePrice;
        // } else {
        //     $cost = $sum_prices + $transportations ;
        // }
        
        // get cruise id
        $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');
        $cruisetotal = 0;
        $totalOccupancy = $adults + $children;
        if(isset($cruise_id) && $cruise_id && count($cruise_id) > 0) {
            $cruises = CruiseModel::whereIn('id', $cruise_id)->get();

            foreach ($cruises as $cruise) {
                $adult_price = 0;
                $child_price = 0;
                $numberOfNights = $cruise->number_of_nights;
            
                $cruise_room = PackageHotelRoom::select('id', 'max_num_adult', 'max_num_children')
                    // ->where('max_num_adult', '>=', $totalOccupancy)
                    // ->where('max_num_children', '>=', $totalOccupancy)
                    ->where('model_id', $cruise->id)
                    ->first();
                
                // if($cruise_room) {
                    $maxAdultNumber = $cruise_room->max_num_adult;
                    $maxChildNumber = $cruise_room->max_num_children;
                    
                    // if ($adults <= $maxAdultNumber && $children <= $maxChildNumber) {
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
                        
                        if ($adults > 0) {
                            $adult_price += $adults * $cruise_price->price_per_day;
                            
                            if(isset($childAges) && count($childAges) > 0) {
                                for($x = 0; $x < $children; $x++) {
                                    $children_cruise = CruiseChildrenPackage::where('cruise_id', $id)
                                        ->where('package_hotel_room_id', $cruise_room->id)
                                        ->where('min', '<=', $childAges[$x])
                                        ->where('max', '>=', $childAges[$x])
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
                        } else {
                            $adult_price += $cruise_price->price_per_day;
                        }
                    // }
                // } else {
                //     return response()->json([
                //         'status' => 400,
                //         'errors' => 'Adult or Children Count Not Allowed Limit',
                //     ]);
                // }
                
                $cruisetotal += ($adult_price + $child_price) * $numberOfNights;
            }

            $cost = $sum_prices + $transportationPrice +  $cruisetotal;
        } else {
            $cost = $sum_prices + $transportationPrice ;
        }

        return $cost;
    }

}

?>
