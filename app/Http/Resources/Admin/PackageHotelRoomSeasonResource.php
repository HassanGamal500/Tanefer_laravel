<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageHotelRoomSeasonResource extends JsonResource
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
            'roomSeasonID'              => $this->id ,
            'roomSeasonPricePerDay'     => $this->price_per_day ,
            'roomSeasonStartDate'       => $this->start_date ,
            'roomSeasonEndDate'         => $this->end_date ,
             'SeasonDetails'             => new PackageHotelSeasonResource($this->packageHotelSeason) ,

         ];
    }
}
