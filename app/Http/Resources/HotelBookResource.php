<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelBookResource extends JsonResource
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
            'booking_number' => $this->booking_number,
            'price'          => $this->total_amount,
            'hotel_name'     => $this->hotel_name,
            'booking_status' => $this->booking_status,
            'payment_status' => $this->payment_status,
            'booking_date'   => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'rooms'          => $this->hotelRooms,
            'guests'         => $this->hotelGuests,
            'payment_type'   => $this->payment_type
        ];
    }
}
