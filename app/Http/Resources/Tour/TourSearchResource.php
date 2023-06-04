<?php

namespace App\Http\Resources\Tour;
use App\Models\TourCity;
use App\Http\Resources\Tour\CityResource;

use Illuminate\Http\Resources\Json\JsonResource;

class TourSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $tours =  TourResource::collection($this);
        //dd($tours);
        return [
            "tours" => $tours,
            "Cities" => $this->_getAllCities(),
            "maxPrice" => $this->_getMaxPrice($tours),
            "minPrice" => $this->_getMinPrice($tours)

        ];
    }

    private function _getAllCities(){
        $cities = TourCity::all();
        return CityResource::collection($cities);
    }

    private function _getMaxPrice($tours)
    {
        $maxPrice = ($tours[0]->tourPrices[0]->adult_price) ?? 0;
        foreach($tours as $tour){
            if(!$tour->tourPrices->isEmpty()){
                if($maxPrice < $tour->tourPrices[0]->adult_price){
                    $maxPrice = $tour->tourPrices[0]->adult_price;
                }
            }
        }
        return $maxPrice;
    }

    private function _getMinPrice($tours)
    {
        $minPrice = ($tours[0]->tourPrices[0]->adult_price) ?? 0;
        foreach($tours as $tour){
            if(!$tour->tourPrices->isEmpty()){
                if($minPrice > $tour->tourPrices[0]->adult_price){
                    $minPrice = $tour->tourPrices[0]->adult_price;
                }
            }
        }
        return $minPrice;
    }
}
