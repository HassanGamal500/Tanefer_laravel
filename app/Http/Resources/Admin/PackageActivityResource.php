<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\AvailabilitiesTourResource;
use App\Http\Resources\PackageActivityImageResource;
use App\Http\Resources\TourCityResource;
use App\Models\PricingTiersTour;
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
        $minPrice = PricingTiersTour::where('package_activity_id', $this->id)->min('adult_price');
        $priceActivityQuery = PricingTiersTour::select('adult_price')->where('package_activity_id', $this->id)->where('adult_price', $minPrice)->get();
        $activityPricePerPerson = $priceActivityQuery->count() > 0 ? intval($priceActivityQuery[0]->adult_price) : '';

        $data = [
            'activityID'                => $this->id ,
            'activityTitle'             => $this->title ,
            'activitySort'              => $this->sort ,
            'activityOverview'          => $this->overview ,
            'activityIntro'             => $this->intro ,
            'activityItinerary'         => $this->itinerary ,
            'activityIncludes'          => json_decode( $this->includes ) ?? [] ,
            'activityExcludes'          => json_decode( $this->excludes ) ?? [] ,
            'activityCity'              => new TourCityResource($this->tourCity ) ,
            'activityImage'             => $this->image ,
            'activityPricePerPerson'    => $activityPricePerPerson ,
            'activityDuration_digits'    => $this->duration_digits ,
            'activityDuration_type'     => $this-> duration_type,
            'activityType'              => $this->activity_type ,
            'activityStartTime'         => $this->start_time ,
            'activityEndTime'           => $this->end_time ,
            'published'                 => $this->is_published,
            'activityImages'            => PackageActivityImageResource::collection($this->packageActivityImages),
            'availabilities'              => AvailabilitiesTourResource::collection($this->availabilityTour ) ,
            'start_days'                => explode(',',$this->start_days),
            'slug'          => $this->slug,
            'seo_titel'      => $this->seo_titel,
            'seo_description'=> $this->seo_description,
            'featured_image' => $this->featured_image != null ? asset('storage/'.$this->featured_image) : null

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
