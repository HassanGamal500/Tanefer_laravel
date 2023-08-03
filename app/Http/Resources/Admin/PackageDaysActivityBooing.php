<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PackageDaysActivityBooing extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
                $crui = DB::table('package_bookingadventrues')
                ->select('id', 'adventrue_id')
                ->where('package_id', $this->package_id)
                ->where('package_day_id', $this->id)
                ->get();


        return [
            'id'  => $this->id ,
            'day_number'  => $this->day_number ,
            'start'  => $this->start ,
            'days' =>  PackagetourzBooing::collection($crui),

        ];
    }
}
