<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageHotelResource extends JsonResource
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
            'hotelID'           => $this->id ,
            'hotelName'         => $this->name ,
            'hotelStars'        => $this->stars ,
            'hotelImage'        => $this->image ,
            'hotelPrice'        => $this->lowest_price ,
        ];
    }
}
