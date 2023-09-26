<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GtaCountryResource extends JsonResource
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
            "code" => $this->code,
            "Jpd_code" => $this->Jpd_code,
            "area_type" => $this->area_type,
        ];
    }
}
