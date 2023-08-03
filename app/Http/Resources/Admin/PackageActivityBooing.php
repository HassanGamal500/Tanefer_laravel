<?php

namespace App\Http\Resources\Admin;

use App\Models\Package;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PackageActivityBooing extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $tourCity = DB::table('tour_cities')->select('name')->where('id', $this->tour_city_id)->first();
        $cruises = DB::table('cruises')->select('name')->where('id', $this->cruise_id)->first();
        $crui = DB::table('package_booking_days')->where('package_id', $this->package_id )->where('package_city_id', $this->id )->get();
        $data = [
            'id'=>$this->id,
            'package_day_id'=>$this->id,
            'city_id' => $this->tour_city_id,
            'cityname' => $tourCity->name,
            'start' => $this->start,
            'days_number' => $this->days_number,
            'type' => $this->type,
            'cruise_id ' => $this->cruise_id ?? null,
            'cruisename ' => $cruises->name ?? null ,
            'days' =>  PackageDaysActivityBooing::collection($crui),

        ];
        return $data;
    }
}


