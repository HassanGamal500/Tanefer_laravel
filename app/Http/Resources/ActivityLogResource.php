<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogResource extends JsonResource
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
            'action' => $this->action,
            'params' => json_decode($this->params,true),
            'user_name' => $this->user->name,
            'date'      => Carbon::parse($this->created_at)->format('Y-m-d')
        ];
    }
}
