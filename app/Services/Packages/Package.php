<?php

namespace App\Services\Packages;

use App\Models\Cruise;
use App\Models\PackageHotel;
use App\Models\PackageHotelRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Package
{
    public function calculateTotalPrice($request)
    {
        $package = \App\Models\Package::find($request->package_id);
        $adultsOccupancy = 0;
        $childrenOccupancy = 0;
        foreach ($request->roomGuests as $roomGuest){
            $adultsOccupancy += $roomGuest['adults'];
            $childrenOccupancy += $roomGuest['children'];
        }

        if($adultsOccupancy == 2 || ($adultsOccupancy == 1 && $childrenOccupancy == 1)){
            $priceType = 'Limo';
            $childrenPercentage = $package->limo_children_percentage;
            $pricePerPerson = $package->Limo_packageprice;
        }elseif($adultsOccupancy == 1){
            $priceType = 'solo';
            $childrenPercentage = $package->limo_children_percentage;
            $pricePerPerson = $package->solo_packageprice;
        }
        elseif($adultsOccupancy <= 8){
            $priceType = 'HiAC';
            $childrenPercentage = $package->hiac_children_percentage;
            $pricePerPerson = $package->HiAC_packageprice;
        }elseif ($adultsOccupancy <= 18){
            $priceType = 'Caster';
            $childrenPercentage = $package->caster_children_percentage;
            $pricePerPerson = $package->Caster_packageprice;
        }elseif ($adultsOccupancy <= 50){
            $priceType = 'bus';
            $childrenPercentage = $package->bus_children_percentage;
            $pricePerPerson = $package->bus_packageprice;
        }else{
            $priceType = 'perPerson';
            $childrenPercentage = 0;
            $pricePerPerson = $package->price_per_person;
        }

        if(file_exists(storage_path('app/public/savePackagePricing/pricing.txt'))){
            Storage::append('/savePackagePricing/pricing.txt',"\n\n\n".now().':  '.$priceType.'Price: '.$pricePerPerson);
        }else{
            Storage::put('/savePackagePricing/pricing.txt',now().':  '.$priceType.'Price: '.$pricePerPerson);
        }

        if($request->singleSupplement){
            $singleSupplementTravellers = ($adultsOccupancy - $request->single_travellers_num) ?? 1;
            $totalSingleTravellersPrice = $pricePerPerson * $singleSupplementTravellers;

            $totalPriceWithSingleSupplement =  ($totalSingleTravellersPrice * ($package->single_supplement_percentage/100))
            + $totalSingleTravellersPrice;

            $totalPriceForAdults = ($pricePerPerson * $adultsOccupancy) + $totalPriceWithSingleSupplement;

            Storage::append('/savePackagePricing/pricing.txt',now().':  TotalWithSingleSupplementPercentage: '.$totalPriceForAdults);
        }else{
            $totalPriceForAdults = $pricePerPerson * ($adultsOccupancy);
        }

        Storage::append('/savePackagePricing/pricing.txt',now().':  totalPriceForAdults: '.$totalPriceForAdults);
        $childrenPercentage = $childrenPercentage == 0 ? $package->children_percentage : $childrenPercentage;
        $totalPriceForChildren = $pricePerPerson * $childrenOccupancy * ($childrenPercentage / 100);


        Storage::append('/savePackagePricing/pricing.txt',now().':  totalPriceForChildren: '.$totalPriceForChildren);

        $totalPrice = $totalPriceForAdults + $totalPriceForChildren;
        Storage::append('/savePackagePricing/pricing.txt',now().':  totalPrice: '.$totalPrice);

        $minTotalPrice = $totalPrice / 2 ;

        if($totalPrice < $minTotalPrice){
            $totalPrice  = $minTotalPrice;
        }


        $totalPrice = $this->changePriceWithChangeActivity($totalPrice,$request->added_activities,$request->removed_activities,$request,$adultsOccupancy,$childrenOccupancy);

        if($request->cruise_id){
            $totalPrice = $totalPrice + $this->addCruisePrice($request);
        }

        Storage::append('/savePackagePricing/pricing.txt',now().':  totalPriceAfterChangeOfActivities: '.$totalPrice);

        $totalPriceWithHotelsPrices = $this->addRoomsPricesToTotalPrice($totalPrice,$request);

        Storage::append('/savePackagePricing/pricing.txt',now().':  totalPriceAfterAddRoomsPrices: '.$totalPriceWithHotelsPrices['totalPrice']);


        $sessionId = Str::uuid()->toString();

        $totalPriceWithHotelsPrices['sessionId'] = $sessionId;

        Cache::put($sessionId,$totalPriceWithHotelsPrices,1200);

        return $totalPriceWithHotelsPrices;
    }

    /**
     * Check if user change activity and impact it on total price
     * */
    protected function changePriceWithChangeActivity($totalPrice,$addedActivities,$removedActivities,$request,$adultsOccupancy,$childrenOccupancy)
    {
        if($addedActivities != null){
            foreach ($addedActivities as $activity){
                Storage::append('/savePackagePricing/pricing.txt',now().':  activityAdded: ');
                $totalPrice = $totalPrice + $this->getActivityTotalPrice($activity,$request,$adultsOccupancy,$childrenOccupancy);
            }
        }

        if($removedActivities != null){
            foreach ($removedActivities as $activity){
                Storage::append('/savePackagePricing/pricing.txt',now().':  activityRemoved: ');
                $totalPrice = $totalPrice - $this->getActivityTotalPrice($activity,$request,$adultsOccupancy,$childrenOccupancy);
            }
        }

        return $totalPrice;
    }



    private function getActivityTotalPrice($activity,$request,$adultsOccupancy,$childrenOccupancy)
    {
        $totalOccupancy = $adultsOccupancy + $childrenOccupancy;
        if($totalOccupancy <= 2 && !$request->solo){
            $pricePerPerson = $activity['Limo_price'];
        }elseif($totalOccupancy <= 8 && !$request->solo){
            $pricePerPerson = $activity['HiAC_price'];
        }elseif ($totalOccupancy <= 18 && !$request->solo){
            $pricePerPerson = $activity['Caster_price'];
        }elseif ($totalOccupancy <= 50 && !$request->solo){
            $pricePerPerson = $activity['bus_price'];
        }elseif($request->solo){
            $pricePerPerson = $activity['solo_price'];
        }else{
            $pricePerPerson = $activity['activityPricePerPerson'];
        }

        Storage::append('/savePackagePricing/pricing.txt',now().':  activityPricePerPerson: '.$pricePerPerson);

        $totalPriceForAdults = $pricePerPerson * $adultsOccupancy;

        Storage::append('/savePackagePricing/pricing.txt',now().':  activityTotalPriceAdultsInactivity: '.$totalPriceForAdults);

        $totalPriceForChildren = $pricePerPerson * $childrenOccupancy * ($activity['children_percentage'] / 100);

        Storage::append('/savePackagePricing/pricing.txt',now().':  activityTotalPriceChildrenInactivity: '.$totalPriceForChildren);

        $totalPrice = $totalPriceForAdults + $totalPriceForChildren;

        Storage::append('/savePackagePricing/pricing.txt',now().':  activityTotalPrice: '.$totalPrice);


        if($request->singleSupplement){
            $totalPrice = ($totalPrice * ($activity['single_supplement_percentage']/100)) + $totalPrice;
        }

        return $totalPrice;
    }

    private function addCruisePrice($request)
    {
        $cruise = Cruise::find($request->cruise_id);

        $startDate = $request->startDate;
        $endDate = Carbon::parse($startDate)->addDays(($cruise->number_of_nights + 1))->format('Y-m-d');
        $numberOfDays = $cruise->number_of_nights + 1;

        $cruiseTotalPrice = 0;
        foreach ($request->roomGuests as $roomGuest) {
            $rooms = $cruise->rooms()->whereHas('packageHotelRoomSeason' , function ($q) use ($startDate, $endDate) {
                $q->where('start_date', '<=',$startDate)
                    ->where('end_date','>=',$endDate);
            })->where('max_num_adult', '>=', $roomGuest['adults'])
                ->where('max_num_children', '>=', $roomGuest['children'])
                ->get();

            if(count($rooms) != 0){
                $price = $rooms[0]->packageHotelRoomSeason->min('price_per_day');
                foreach ($rooms as $room){
                    $roomPrice = $room->packageHotelRoomSeason->min('price_per_day');
                    if($roomPrice <= $price){
                        $price = $roomPrice;
                    }
                }

                $cruiseTotalPrice += $price * $numberOfDays;
            }
        }

        return $cruiseTotalPrice;
    }

    private function addRoomsPricesToTotalPrice($totalPrice,$request)
    {
        $hotelsPrices = [];
        foreach ($request->packageCities as $packageCity){
            $numberOfDays = $packageCity['cityDuration'];
            $hotelTotalPrice = 0;

            $startDate = $request->startDate;
            $endDate = Carbon::parse($startDate)->addDays($numberOfDays)->format('Y-m-d');

            $hotel = null;
            if(count($packageCity['hotelRooms']) > 0){
                foreach ($packageCity['hotelRooms'] as $hotelRoom){
                    $hotelTotalPrice +=
                        $hotelRoom['roomSeasons']['roomSeasonPricePerDay']
                        * $numberOfDays * (int)$hotelRoom['selectionNumber'];
                    $hotel = PackageHotelRoom::find($hotelRoom['roomID'])->packageHotel;
                }
            }else{
                if(array_key_exists('hotelID',$packageCity)){
                    $hotel = PackageHotel::find($packageCity['hotelID']);
                    $hotelRooms = [];
                    $hotelTotalPrice = 0;
                    foreach ($request->roomGuests as $roomGuest) {
                        $rooms = $hotel->packageHotelRooms()->whereHas('packageHotelRoomSeason',function($q)use($startDate,$endDate){
                            $q->where('start_date', '<=',$startDate)
                                ->where('end_date','>=',$endDate);
                        })->where('max_num_adult', '>=', $roomGuest['adults'])
                            ->where('max_num_children', '>=', $roomGuest['children'])
                            ->get();
                        if(count($rooms) != 0){
                            $price = $rooms[0]->packageHotelRoomSeason->min('price_per_day');
                            foreach ($rooms as $room){
                                $roomPrice = $room->packageHotelRoomSeason->min('price_per_day');
                                if($roomPrice <= $price){
                                    $price = $roomPrice;
                                    $lowestPriceRoom = $room;
                                }
                            }

                            $hotelTotalPrice += $price * $numberOfDays;
                            if($hotelTotalPrice == 0){
                                $hotelRooms = [];
                            }else{
                                $hotelRooms[] = $lowestPriceRoom;
                            }
                        }

                    }
                }else{
                    $hotelRooms = [];
                }
            }

            if($hotel != null){
                $hotelsPrices[] = [
                    'HotelName' => $hotel->name,
                    'totalPrice' => $hotelTotalPrice,
                    'rooms'      => $hotelRooms ?? []
                ];
            }

            $totalPrice += $hotelTotalPrice;
        }

        return ['hotelPrices' => $hotelsPrices,'totalPrice' => $totalPrice];
    }

}
