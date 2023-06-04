<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageActivitySideActivityResource extends JsonResource
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
            'activityID'               => $this->id ,
            'activityName'             =>$this->name ,
            'activityTime'             =>$this->time ,
            'activityDayNumber'        =>$this->day_number ,
        ];
    }
}
