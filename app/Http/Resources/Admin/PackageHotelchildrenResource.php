<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageHotelchildrenResource extends JsonResource
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
            'policyID'                  => $this->id ,
            'occupancy'                 => $this->occupancy,
            'first_child'               => $this->firstChild(),
            'second_child'              => $this->secondChild(),
        ];
    }

    private function firstChild()
    {
        for ($i=1; $i<12; $i++){
            $firstChild[] = $this->{'first_child_'.$i};
        }
        return $firstChild;
    }

    private function secondChild()
    {
        for ($i=1; $i<12; $i++){
            $secondChild[] = $this->{'second_child_'.$i};
        }
        return $secondChild;
    }
}
