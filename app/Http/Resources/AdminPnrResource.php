<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminPnrResource extends JsonResource
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
            'price'             => number_format((float)$this->price,2,'.',','),
            'currency'          => $this->currency,
            'contact_person'    => $this->contact_person,
            'contact_email'     => $this->contact_email,
            'contact_phone'     => $this->contact_phone,
            'status'            => $this->status->status,
            'booking_date'      => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'booked_by'         => $this->user->name ?? 'Guest',
            'mail_client'       => $this->client->name ?? null,
            'booked_from'       => $this->bookedFrom->name ?? null,
            'payment_type'      => $this->payment_type
        ];
    }
}
