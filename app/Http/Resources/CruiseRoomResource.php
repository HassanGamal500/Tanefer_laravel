<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CruiseRoomResource extends JsonResource
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
            'id' => $this->id,
            'type' => $this->type,
            'room_number' => $this->room_number,
            'occupancy' => $this->occupancy,
            'inclusions' => $this->inclusions,
            'amenities'  => $this->amenities,
            'max_num_adult' => $this->max_num_adult,
            'max_num_children' => $this->max_num_children,
            'categories' => $this->categories,
            'price_per_day' => $this->packageHotelRoomSeason()->where('start_date', '<=',$request->start_date)->first()->price_per_day ?? 0
        ];
    }
}
