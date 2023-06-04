<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PnrResource extends JsonResource
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
            'booking_reference' => $this->pnr_id,
            'type'              => $this->type,
            'price'             => number_format((float)$this->price,2,'.',','),
            'currency'          => $this->currency,
            'contact_person'    => $this->contact_person,
            'contact_email'     => $this->contact_email,
            'contact_phone'     => $this->contact_phone,
            'status'            => $this->status->status,
            'booking_date'      => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'flight_segments'   => $this->flightSegments,
            'passenger_details' => $this->passengerDetails,
            'car_details'       => $this->carBookingDetails,
            'payment_type'      => $this->payment_type
        ];
    }
}
