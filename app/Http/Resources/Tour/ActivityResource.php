<?php

namespace App\Http\Resources\Tour;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'title' => $this->title,
            'overview' => $this->overview,
            'includes' => json_decode($this->includes) ?? [],
            'excludes' => json_decode($this->excludes) ?? [],
            'price_per_person' => $this->price_per_person,
            'duration' => $this->duration_digits.' '.$this->duration_type,
            'type'     => $this->activity_type,
            'pax_min_number' => $this->pax_min_number,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'images'   => ActivityImageResource::collection($this->packageActivityImages),
            'side_activities' => ExtraActivitiesResource::collection($this->packageActivitySideActivity)
        ];
    }
}
