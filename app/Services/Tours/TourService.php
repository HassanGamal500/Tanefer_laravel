<?php


namespace App\Services\Tours;
use App\Models\Tour;
use App\Models\TourCity;
use App\Models\TourPrice;
use App\Models\TourBooking;
use Illuminate\Http\Exceptions\HttpResponseException;

class TourService
{
    public function getCities(string $term){

        $cities = TourCity::where('name','LIKE',strtoupper($term).'%')
                ->orWhere('name','LIKE','%'.$term.'%')->take(10)->get();
        return $cities;
    }

    public function getTours($city_name){

        $city = TourCity::where('name',$city_name)->first();

        if($city){
            return $city->tours()
            ->with(['tourPrices' => function ($query) {
                //$query->where('numberOfPassenger','1')
                $query->where('room_type','Single')->select('adult_price','child_price','start_date','end_date','repeat','tour_id','numberOfPassenger');
            }])
            ->get();
        }else{
            throw new HttpResponseException(response()->json(['tours'=> [],'message' => "city not found","errors" => []], 404));
        }
        

    }

    public function getTourDetails($tour){
        // $tourDetails = $tour->with(['tourChildrenPolicies' => function ($query) {
        //     $query->select('policy','tour_id');
        // }])->first();
        
        $tourDetails = $tour->with(['tourChildrenPolicies', 'tourExtraActivities','tourImages','tourPlaces','tourPrices','tourPrograms','tourServices']);

        return $tourDetails;

    }

    public function getTour($tour_id){
        $tour = Tour::where('id',$tour_id)->with(['tourPrices' => function ($query) {
            //$query->where('numberOfPassenger','1')
            $query->where('room_type','Single')->select('adult_price','child_price','start_date','end_date','repeat','tour_id','numberOfPassenger');
        },'tourExtraActivities'])->first();

        return $tour;

    }

    public function insertTourBooking($data){
        $bookingData = TourBooking::create($data);

        return $bookingData;
    }

    public function getTotalPrice($data){
        $extraPrices = $adultsPrice = $childrenPrice = 0;
        
        $adult = TourPrice::where('tour_id',$data['tour_id'])->ofPax($data['adults'])->ofType($data['type'])->first();
        $adultOfType = TourPrice::where('tour_id',$data['tour_id'])->ofType($data['type'])->first();
        if($adult){
            $adultsPrice = $adult->adult_price*$data['adults'];
        }elseif($adultOfType){
            
            //check if adult > = minimum pax
            $minimumPax = $adultOfType->numberOfPassenger;
            if($data['adults'] >= $minimumPax){
                $adultsPrice = $adultOfType->adult_price*$data['adults'];
                $childrenPrice = $adultOfType->child_price*$data['children'];
                //dd($adultsPrice);
            }else{
                $message = "minimum number of adult passenger is $minimumPax";
                //dd($message);
            }

        }
        else{
            $message = "Price is not calculated for this number of adults and children";
            //return $totalPrice = 0;
        }

        if($data['children']){
            $child = TourPrice::where('tour_id',$data['tour_id'])->ofPax($data['children'])->ofType($data['type'])->first();
            if($child){
                $childrenPrice = $child->child_price*$data['children'];
            }elseif($adultOfType){
                $childrenPrice = $adultOfType->child_price*$data['children'];
            }else{
                $message = "Price is not calculated for this number of adults and children or room type";
               
            }

        }
        

        if(!empty($data['ExtraPrices'])){
            foreach($data['ExtraPrices'] as $item){
                $extraPrices +=$item;
            }
            $extraPrices = ($extraPrices)*($data['adults']+$data['children']);
        }

        if($adultsPrice > 0){
            $totalPrice = $adultsPrice + $childrenPrice + $extraPrices;
            $message = "Price is calculated Successfully";
            $status = 200;
        }else{
            $totalPrice = 0;
            $status = 403;
        }

        return ['totalPrice' => $totalPrice, 'message' => $message,'status' => $status];
        

    }
}
