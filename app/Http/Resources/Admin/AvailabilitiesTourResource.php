<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailabilitiesTourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id'=>$this->id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'pricingtiers' => PricingTiersTourResource::collection($this->packageActivityPricingTiers)
        ];
        return $data;
    }
}
