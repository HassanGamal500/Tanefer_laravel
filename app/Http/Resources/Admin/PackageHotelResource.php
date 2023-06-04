<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\TourCityResource;
use App\Http\Resources\Admin\PackageHotelchildrenResource;

use App\Models\PackageHotelRoom;
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
            'hotelAddress'      => $this->address ,
            'hotelLatitude'     => $this->latitude ,
            'hotelLongitude'    => $this->longitude ,
            'hotelDescription'  => $this->description ,
            'hotelFacilities'   => json_decode( $this->facilities ) ,
            'hotelPolicies'     => json_decode( $this->policies ) ,
            'hotelStars'        => $this->stars ,
            'hotelPhone'        => $this->phone ,
            'hotelImage'        => $this->image ,
            'hotelTourCity'     => new TourCityResource($this->whenLoaded( 'tourCity' )),
            'hotelImages'       => PackageHotelImageResource::collection( $this->whenLoaded( 'packageHotelImages' )),
            'hotelRooms'        => PackageHotelRoomResource::collection( $this->whenLoaded( 'packageHotelRooms' ) ),
            'childrenPolicies'  => $this->whenLoaded('packageHotelChildren')


        ];
    }
}
