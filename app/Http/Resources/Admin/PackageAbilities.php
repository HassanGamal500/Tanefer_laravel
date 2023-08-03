<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageAbilities extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id'=>$this->id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'days' => json_decode( $this->days),

        ];
        return $data;
    }
}
