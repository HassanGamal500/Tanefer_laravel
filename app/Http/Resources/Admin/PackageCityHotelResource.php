<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageCityHotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'tripCityHotelID'     => $this->id,
            'hotelID'             => $this->packageHotel->id,
            'hotelName'           => $this->packageHotel->name,
            'hotelImage'          => $this->packageHotel->image,
            'hotelStars'          => $this->packageHotel->stars ,
           // 'room'                =>new PackageHotelRoomResource ( $this->packageHotelRoom )

        ];
    }
}
