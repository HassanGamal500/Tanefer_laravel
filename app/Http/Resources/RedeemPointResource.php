<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RedeemPointResource extends JsonResource
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
            'id' => $this->id,
            'points' => $this->points,
            'points_per_unit_price' => $this->points_per_unit_price,
            'price_amount'          => $this->price_amount,
            'currency'              => $this->currency,
            'booking_type'          => $this->bookingType(),
            'booking_reference'     => $this->bookingReference(),
        ];
    }

    public function bookingType()
    {
        if(isset($this->booking->booking_number)){
            return 'Hotel';
        }elseif ($this->booking->type == 'car'){
            return 'Car';
        }else{
            return 'Flight';
        }
    }

    public function bookingReference()
    {
        if(isset($this->booking->booking_number)){
            return $this->booking->booking_number;
        }else{
            return $this->booking->pnr_id;
        }
    }
}
