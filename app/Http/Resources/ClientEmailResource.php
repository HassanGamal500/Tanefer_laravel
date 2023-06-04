<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientEmailResource extends JsonResource
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
            'to' => $this->to,
            'cc' => $this->cc,
            'createdAt'=> Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('Y-m-d H:i')
        ];
    }
}
