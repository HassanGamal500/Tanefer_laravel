<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "Code" => isset($this->code) ? $this->code : $this->id,
            "Name" => $this->name,
            "City" => $this->city,
            "countryCode" => $this->country,
            "Country" => $this->countryName,
            "Type" => $this->location_type ?? 'A',
            //'Airports' => isset($this->airports) ? AirportResource::collection($this->whenLoaded('airports')) : []
            ];
    }
}
