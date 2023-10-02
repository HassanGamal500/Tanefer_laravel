<?php

namespace App\Http\Resources\Admin;

use App\Models\GtaCity;
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
        $city = GtaCity::where('id', $this->city_id)->pluck('name')->first();
        $hotel = GtaHotelPortfolio::where('id', $this->hotel_id)->pluck('name')->first();
        return [
            'id'                  => $this->id ,
            'city'                  => $city ,
            'hotel'                  => $hotel ,
            // 'package_city_id'         => $this->package_city_id  ,
            // 'type'                  => $this->type ,
        ];
    }
}
