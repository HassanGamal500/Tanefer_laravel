<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageCityTransportationResource extends JsonResource
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
            'transportationID'              => $this->id ,
            'transportationType'            => $this->type ,
            'transportationDate'            => $this->date ??null ,
            'transportationPricePerPerson'  => $this->price_per_person ,
            'destinationCity'               => $this->destinationCity ? $this->destinationCity->name : null ,
//            'destinationCity' => $this->destination_city_id ,

        ];
    }
}
