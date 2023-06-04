<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageCityActivityResource extends JsonResource
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
            'packageCityActivityID'             => $this->id,
            'activityDayNumber'                 => $this->day_number,
            'activityDayDate'                   => $this->day_date,
            'activity'                          => new PackageActivityResource( $this->packageActivity ) ,
        ];
    }
}
