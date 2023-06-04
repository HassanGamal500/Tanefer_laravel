<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CruiseResource extends JsonResource
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
            'name' => $this->name,
            'cruise_line' => $this->cruise_line,
            'ship_name' => $this->ship_name,
            'facilities' => $this->facilities,
            'description' => $this->description,
            'policies' => $this->policies,
            'excludes' => $this->excludes,
            'includes' => $this->includes,
            'stars' => $this->stars,
            'master_image' =>$this->master_image,
            'number_of_nights' =>$this->number_of_nights,
            'start_days' => $this->start_days,
            'images' => $this->images,
            'available_dates' => CruiseSeasonResource::collection($this->rooms->map->packageHotelRoomSeason->flatten()),
            'rooms'           => $this->whenLoaded('rooms'),
            'cities'          => $this->whenLoaded('cities')
        ];
    }
}
