<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GtaHotelCatalogueResource extends JsonResource
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
            "type" => $this->type,
            "catalogue_type" => $this->catalogue_type
        ];
    }
}
