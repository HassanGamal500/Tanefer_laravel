<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlightsPromotionResource extends JsonResource
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
            'origin' => (new AirportResource($this->origin)),
            'originType' => 'A',
            'destination' => (new AirportResource($this->destination)),
            'destinationType' => 'A',
            'originImg'  => $this->origin_image_url,
            'destinationImg' => $this->destination_image_url,
            'departureDate'  => $this->departure_date,
            'returnDate'     => $this->return_date,
            'fare'           => $this->lowest_fare,
            'discountAmount'=> $this->discount_amount,
            'newFare'       => round(($this->lowest_fare -  $this->discount_amount),2)

        ];
    }
}
