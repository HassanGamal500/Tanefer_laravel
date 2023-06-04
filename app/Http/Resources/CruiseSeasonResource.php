<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CruiseSeasonResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ];
    }
}
