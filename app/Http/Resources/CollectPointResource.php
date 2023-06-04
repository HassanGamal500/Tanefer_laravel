<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectPointResource extends JsonResource
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
            'points' => $this->points,
            'description' => $this->reason,
            'book_type' => $this->bookingType(),
            'date'=> Carbon::parse($this->created_at)->format('Y-m-d'),
            'booking_reference' => $this->bookingReference()
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
