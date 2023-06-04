<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelBookingResource extends JsonResource
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
            'id'                => $this->id,
            'booking_reference' => $this->booking_number,
            'contact_name'      => $this->contact_name_person,
            'contact_phone'     => $this->contact_phone,
            'contact_email'     => $this->contact_email,
            'totalPrice'        => $this->total_amount,
            'paidPrice'         => $this->paid_price,
            'booking_status'    => is_null($this->hotelBookingStatus) ? null : $this->hotelBookingStatus->name,
            'payment_status'    => is_null($this->paymentStatus) ? null : $this->paymentStatus->name,
            'booking_date'      => $this->created_at,
            'payment_type'      => $this->payment_type,
            'booked_by'         => $this->user->name ?? 'Guest',
            'booked_from'       => $this->bookedFrom->name ?? null,
            'main_client'       => $this->client->name ?? null
        ];
    }
}
