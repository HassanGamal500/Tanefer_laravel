<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\PackageImageResource;
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
        $firstStartCity = $this->startCity()->first();
        $startCity = isset($firstStartCity) ?
            $this->startCity()->first()->tourCity()
                ->select('name As cityName','code As cityCode')->first() : null ;
        return [
            'packageID'                => $this->id,
            'packageTitle'             => $this->title,
            'packageSlug'              => $this->slug,
            'packageImageAlt'          => $this->image_alt,
            'packageImageCaption'      => $this->image_caption,
            'packageImage'             => $this->image,
            'packageOverview'          => $this->overview,
            'packageNightsNumber'      => $this->nights_number,
            'packageDuration'          => $this->duration,
            'packagePricePerPerson'    => $this->has_supplement ? ($this->price_per_person * 0.05) + $this->price_per_person : $this->price_per_person,
            'solopackagePricePerPerson'    => $this->solo_packageprice,
            'limopackagePricePerPerson'    => $this->Limo_packageprice,
            'hiacpackagePricePerPerson'    => $this->HiAC_packageprice,
            'casterpackagePricePerPerson'    => $this->Caster_packageprice,
            'buspackagePricePerPerson'    => $this->bus_packageprice,
            'childrenpercentage'    => $this->children_percentage,
            'additional_cost'          => $this->additional_cost,
            'starting_airport'         => $this->starting_airport,
            'expected_price'           => $this->expected_price,
            'package_occupancy'         => intval($this->occupancy),
            'packageStartDate'         => $this->start_date,
            'packageIncludes'          => json_decode( $this->includes ),
            'packageExcludes'          => json_decode( $this->excludes ),
            'packageStartCity'         => $startCity,
            'isTop'                    => $this->is_top,
            'rank'                     => $this->rank,
            'packageCities'            => PackageCityResource::collection( $this->packageCity ),
            'start_days'               => array_filter(explode(',',$this->start_days)),
            'seasons'                  => $this->seasons,
            'single_supplement_percentage' => $this->single_supplement_percentage,
            'packageMetaTitle'             => $this->seo_title,
            'packageMetaDesc'              => $this->meta_description,
            'packageImages'                => array_column(PackageImageResource::collection($this->packageImages)->toArray($request),'image'),
            'limoChildrenPercentage'       => $this->limo_children_percentage,
            'hiacChildrenPercentage'       => $this->hiac_children_percentage,
            'casterChildrenPercentage'     => $this->caster_children_percentage,
            'busChildrenPercentage'      => $this->bus_children_percentage,
            'cruise'                     => $this->cruise()->with('images')->first()
        ];
    }
}
