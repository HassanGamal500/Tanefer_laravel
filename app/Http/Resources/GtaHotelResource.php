<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GtaHotelResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "Jpd_code" => $this->Jpd_code,
            "has_synonyms" => $this->has_synonyms,
            "address" => $this->address,
            "zip_code" => $this->zip_code,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "zone" => $this->zone->name ?? null,
            "hotel_category" => $this->hotel_category->name ?? null,
            "city" => $this->city->name ?? null,
        ];
    }
}
