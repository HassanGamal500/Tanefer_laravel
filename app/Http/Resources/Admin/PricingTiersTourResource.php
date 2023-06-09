<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PricingTiersTourResource extends JsonResource
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
            'name' => $this->name,
            'min' => $this->min,
            'max' => $this->max,
            'adult_price' => $this->adult_price,
            'child_percentage' => $this->child_percentage,
        ];
        return $data;
    }
}
