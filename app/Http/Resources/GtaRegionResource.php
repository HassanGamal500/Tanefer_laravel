<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GtaRegionResource extends JsonResource
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
            "parent_Jpd_code" => $this->parent_Jpd_code,
            "parent_code" => $this->parent_code,
            "area_type" => $this->area_type,
        ];
    }
}
