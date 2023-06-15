<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\AvailabilitiesTourResource;
use App\Http\Resources\PackageActivityImageResource;
use App\Http\Resources\TourCityResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class PackageActivityResource extends JsonResource
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
            'activityID'                => $this->id ,
            'activityTitle'             => $this->title ,
            'activityOverview'          => $this->overview ,
            'activityIntro'             => $this->intro ,
            'activityItinerary'         => $this->itinerary ,
            'activityIncludes'          => json_decode( $this->includes ) ?? [] ,
            'activityExcludes'          => json_decode( $this->excludes ) ?? [] ,
            'activityCity'              => new TourCityResource($this->tourCity ) ,
            'activityImage'             => $this->image ,
            // 'activityPricePerPerson'    => $this->has_supplement ? ($this->price_per_person * 0.05) + $this->price_per_person : $this->price_per_person ,
            'activityDuration_digits'    => $this->duration_digits ,
            // 'activityDuration_type'     => $this-> duration_type,
            // 'activityType'              => $this->activity_type ,
            // 'activityPaxMinimum'        => $this->pax_min_number ,
            'activityStartTime'         => $this->start_time ,
            // 'activityEndTime'           => $this->end_time ,
            'published'                 => $this->is_published,
            'activityImages'            => PackageActivityImageResource::collection($this->packageActivityImages),
            'availabilities'              => AvailabilitiesTourResource::collection($this->availabilityTour ) ,
            // 'PricingTiers'            => PricingTiersTourResource::collection($this->packageActivityPricingTiers),
            // 'solo_price'                => $this->solo_price,
            // 'Limo_price'                => $this->Limo_price,
            // 'HiAC_price'                => $this->HiAC_price,
            // 'Caster_price'              => $this->Caster_price,
            // 'bus_price'                 => $this->bus_price,
            // 'start_days'                => explode(',',$this->start_days),
            // 'seasons'                   => $this->seasons,
            // 'single_supplement_percentage' => $this->single_supplement_percentage,
            // 'children_percentage'          => $this->children_percentage,
            // 'limoChildrenPercentage'       => $this->limo_children_percentage,
            // 'hiacChildrenPercentage'       => $this->hiac_children_percentage,
            // 'casterChildrenPercentage'     => $this->caster_children_percentage,
            // 'busChildrenPercentage'      => $this->bus_children_percentage,
        ];
        $data ['sideActivity'] = $this->collectSideActivities();

        return $data;
    }

    private function collectSideActivities (){
        if( Request::route()->getName() == 'site.package.details' ){
            $groupedActivities = $this->packageActivitySideActivity()->get()->groupBy('day_number') ;
            if($groupedActivities->count() == 0)
                return  [];

            $groups = [] ;
            foreach ($groupedActivities as $dayNumber => $group){
                if(! $dayNumber)
                    $dayNumber = 1 ;

                foreach ($group as $key =>  $activity){
                    $groups ['day_'.$dayNumber][$key] =  new PackageActivitySideActivityResource($activity );
                }
            }
            return  $groups;
        }else{
            return  PackageActivitySideActivityResource ::collection( $this->packageActivitySideActivity );
        }

    }
}
