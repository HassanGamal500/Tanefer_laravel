<?php
namespace App\Services\Packages;
use App\Models\PackageBookingadventrue;
use App\Models\PackageCity;
use App\Models\PackageCityTransportation;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelRoomSeason;
use App\Models\PricingTiersTour;
use Illuminate\Support\Facades\DB;

class PackageTerPrice {
    public function calculatetierPrice($package_id) {
        // get adventures ids from the package list
        $adventures  = PackageBookingadventrue::where('package_id', $package_id)->pluck('adventrue_id');

        $sum_prices = 0;
        foreach($adventures as $adventure) {
            $prices = PricingTiersTour::where('package_activity_id', $adventure)->groupBy('package_activity_id')->select(DB::raw('MIN(adult_price) as min_price') ,'package_activity_id')->first();

            $sum_prices += $prices->min_price;
        }


        // get transportations
        $transportations = PackageCityTransportation::where('package_id', $package_id)->pluck('price_per_person')->min();

        // get cruise id
        $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');

        if($cruise_id != null) {
            // get price_per_day from cruise
            $cruisePrice = PackageHotelRoomSeason::whereIn('package_hotel_room_id', function ($query) use ($cruise_id) {
                $query->select('id')
                    ->from(with(new PackageHotelRoom())->getTable())
                    ->whereIn('model_id', $cruise_id)
                    ->where('model_type', 'App\Models\Cruise');
            })
            ->pluck('price_per_day')
            ->min();
            $cost = $sum_prices + $transportations +  $cruisePrice;
        } else {
            $cost = $sum_prices + $transportations ;
        }

        return $cost;
    }

}

?>
