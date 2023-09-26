<?php

namespace App\Http\Resources\Admin;

use App\Models\Cruise;
use App\Models\Package;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CruiseResource;

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
        $tourActivities = DB::table('package_activities')->select('id','title','tour_city_id')
        ->where('tour_city_id', $this->tour_city_id)->pluck('id')->toArray();
        $tourActivities = array_map('intval', $tourActivities);
        $cruises = DB::table('cruises')->select('name')->where('id', $this->cruise_id)->first();
        $crui = DB::table('package_booking_days')->where('package_id', $this->package_id )->where('package_city_id', $this->id )->get();
        $transportations = DB::table('package_city_transportations')->where('package_id', $this->package_id )->where('package_city_id', $this->id )->get();
        if($this->type === 'cruise') {
            $cru = Cruise::where('id', $this->cruise_id)->get();
        }
        $hotel = DB::table('package_gta_hotels')->where('package_id', $this->package_id )->where('package_city_id', $this->id )->get();

        $data = [
            'id'=>$this->id,
            'package_day_id'=>$this->id,
            'city_id' => $this->tour_city_id,
            'cityname' => $tourCity->name,
            'start' => $this->start,
            'days_number' => $this->days_number,
            'type' => $this->type,
            'cruisename' => $cruises->name ?? null ,
            'cruise_id' => $this->cruise_id ?? null ,
            'cruise'   => $this->type === 'cruise' ?  CruiseResource::collection($cru) : null,
            'list_adventures'   => $this->type === 'adventure' ? $tourActivities : null,
            'days' =>  PackageDaysActivityBooing::collection($crui),
            'transportations'   => PackageCityTransportationResource::collection( $transportations ),
            'package_hotel' => $hotel ? PackageHotelGtaResource::collection($hotel) : [],


        ];
        return $data;
    }
}


