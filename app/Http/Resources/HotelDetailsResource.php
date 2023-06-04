<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelDetailsResource extends JsonResource
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
            'HotelCode' => $this->code,
            'HotelName' => $this->name,
            'HotelStars'=> (int)$this->star,
            'HotelAddress' => $this->address,
            'HotelCountry' => $this->country,
            'HotelCity'    => $this->city,
            'HotelPhone'   => $this->phone,
            'HotelFax'     => $this->fax,
            'HotelPinCode' => $this->pinCode,
            'map'          => $this->map(),
            'nearByPlaces' => $this->near_by_places,
            'HotelDescription' => $this->description,
            'HotelFacilities'  => explode(',',$this->facilities),
            'images'           =>
                array_column((HotelImagesResource::collection($this->images))->toArray(request()),
                'url')
        ];
    }

    public function map()
    {
        return [
            'Latitude' => $this->map_latitude,
            'Longitude' => $this->map_longitude,
        ];
    }
}
