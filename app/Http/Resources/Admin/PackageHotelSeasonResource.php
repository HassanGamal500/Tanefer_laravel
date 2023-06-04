<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageHotelSeasonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'seasonID'          => $this->id ,
            'seasonStartDate'   => $this->start_date ,
            'seasonEndDate'     => $this->end_date ,

            ];
    }
}
