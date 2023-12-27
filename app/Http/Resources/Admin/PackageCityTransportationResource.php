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
            'transportationName'            => $this->name ,
            'transportationMin'             => $this->min ,
            'transportationMax'             => $this->max ,
            'transportationPrice'           => $this->price ,
        ];
    }
}
