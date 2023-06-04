<?php

namespace App\Http\Resources\Tour;

use Illuminate\Http\Resources\Json\JsonResource;

class TourImagesResource extends JsonResource
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
            'tour_id' => $this->tour_id,
            'image' => asset('images/tours/tour_'.$this->tour_id.'/'.$this->image)
        ];
    }
}
