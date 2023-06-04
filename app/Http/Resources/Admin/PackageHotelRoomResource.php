<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageHotelRoomResource extends JsonResource
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
            'roomID'                    => $this->id ,
            'roomType'                  => $this->type ,
            'roomOccupancy'             => $this->occupancy ,
            'roomInclusions'            => ( $this->inclusions ) ,
            'roomAmenities'             => ( $this->amenities ) ,
            'roomCategories'            => ( $this->categories ) ,
            'roomMaxNumberOfAdult'      => $this->max_num_adult ,
            'roomMaxNumberOfChildren'   => $this->max_num_children ,
            'roomSeasons'                => PackageHotelRoomSeasonResource::collection( $this->packageHotelRoomSeason ),
        ];
    }
}
