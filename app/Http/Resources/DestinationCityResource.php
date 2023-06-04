<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DestinationCityResource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->propertyName(),
            'isHotel' => is_null($this->hotel_name) ? 0 : 1
        ];
    }

    private function propertyName()
    {
        if(is_null($this->hotel_name)){
            $propertyName = str_replace('  ','',$this->cityName).','.trim($this->countryName);
        }else{
            $propertyName = $this->hotel_name.','.$this->cityName.','.$this->countryName;
        }

        return $propertyName;
    }
}
