<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\AirportResource;
use App\Models\Airport;
use App\Models\PackageCityActivity;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class PackageCityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $tourCity = $this->tourCity()->first();

        $data =  [
            'packageCityID'            => $this->id,
            'cityID'                => $this->tour_city_id,
            'cityName'              => $tourCity->name,
            'cityCode'              => $tourCity->code,
            'cityAirport'               => new AirportResource($tourCity->airport),
            'cityDaysNumber'        => $this->days_number,
            'cityDuration'          => $this->duration,
            'cityHotels'            => PackageCityHotelResource::collection( $this->packageCityHotel ),
            'cityActivities'        => PackageCityActivityResource ::collection( $this->packageCityActivity ),
            'cityTransportations'   => PackageCityTransportationResource::collection( $this->packageCityTrasportation ),
            'startCity'             => boolval( $this->start ),
            'cruise'                => $this->cruise,
            'cruise_start_day'      => $this->cruise_start
        ];
        $data ['cityActivities'] = $this->collectCityActivities();

        return $data;
    }

    private function collectCityActivities ()
    {
        if (\Request::route()->getName() == 'site.package.details') {
//            $groupedActivities = $this->packageCityActivity()->get()->groupBy('day_number');
//            if ($groupedActivities->count() == 0)
//                return [];

            $groups = [];

            for ($i = 1; $i <= $this->days_number; $i++){
                $packageCityActivities = $this->packageCityActivity()->where('day_number',$i)->get();
                if(count($packageCityActivities) > 0){
                    $groups['day_'.$i] = PackageCityActivityResource::collection($packageCityActivities);
                }else{
                    $groups['day_'.$i] = [];
                }
            }
//            foreach ($groupedActivities as $dayNumber => $group) {
//
//
//                foreach ($group as $key => $activity) {
//                    $groups ['day_' . $dayNumber][$key] = new PackageCityActivityResource($activity);
//                }
//            }

            return $groups;
        } else {
            return PackageCityActivityResource::collection($this->packageCityActivity);
        }
    }
}
