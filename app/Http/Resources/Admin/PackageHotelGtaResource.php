<?php

namespace App\Http\Resources\Admin;

use App\Models\GtaCity;
use App\Models\PackageGtaHotel;
use App\Models\GtaHotelPortfolio;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageHotelGtaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cityName = GtaCity::where('id', $this->city_id)->pluck('name')->first();
        $hotelIDs = PackageGtaHotel::where('package_id', $this->package_id)->where('city_id', $this->city_id)->pluck('hotel_id');
        $hotels = GtaHotelPortfolio::whereIn('id', $hotelIDs)->get();
        $hotelJpds = GtaHotelPortfolio::whereIn('id', $hotelIDs)->pluck('Jpd_code');
        $getFirstHotel = GtaHotelPortfolio::whereIn('id', $hotelIDs)->first();
        return [
            'id'        => $this->id,
            'city_id'   => $this->city_id,
            'city_name' => $cityName,
            'hotel'     => $getFirstHotel,
            'hotels'    => $hotels,
            'hotelIDs'  => $hotelIDs,
            'hotelJpds' => $hotelJpds,
            // 'package_city_id'         => $this->package_city_id  ,
            // 'type'                  => $this->type ,
        ];
    }
}
