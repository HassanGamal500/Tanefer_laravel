<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'tripID'                => $this->id,
            'tripSlug'              => $this->slug,
            'tripImageAlt'          => $this->image_alt,
            'tripImageCaption'      => $this->image_caption,
            'tripTitle'             => $this->title,
            'tripImage'             => $this->image,
            'tripOverview'          => $this->overview,
            'tripNightsNumber'      => $this->nights_number,
            'tripDuration'          => $this->duration,
            'tripPricePerPerson'    => $this->has_supplement ? ($this->price_per_person * 0.05) + $this->price_per_person : $this->price_per_person,
            'tripStartDate'      => $this->start_date,
            /*'tripIncludes'          => json_decode( $this->includes ),
            'tripExcludes'          => json_decode( $this->excludes ),*/
            'tripCity'              => $this->getTripCities($this->tripCity()->get()),
            'start_days'            => explode(',',$this->start_days),
            'tripImages'            => array_column(PackageImageResource::collection($this->packageImages)->toArray($request),'image')
            ];
    }

   private function getTripCities($tripcities){
        $cities = '';
        foreach ($tripcities as $city){
            $cities .= @$city->tourCity()->first()->name;
            if($city->id != $tripcities->last()->id )
                $cities .=' & ';
        }
        return $cities;
    }
}
