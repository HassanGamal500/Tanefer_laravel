<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\PackageImageResource;
use App\Services\Packages\PackageTerPrice;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\PackageGtaHotel;
use App\Models\PackageTransportation;

class PackageActivityDetails extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $firstStartCity = $this->startCity()->first();
        // $startCity = isset($firstStartCity) ?
        //     $this->startCity()->first()->tourCity()
        //         ->select('name As cityName','code As cityCode')->first() : null ;
        $packageTerPrice = new PackageTerPrice();
        $tierprice = $packageTerPrice->calculatetierPrice($this->id);
        // $transportations = PackageTransportation::where('package_id', $this->id)->min('price');
        // $transportationPrice = $transportations ? $transportations : 0;
        $getGtaHotels = PackageGtaHotel::where('package_id', $this->id)->groupBy('city_id')->get();
        return [
            'packageID'                => $this->id,
            'packageTitle'             => $this->title,
            'packageSlug'              => $this->slug,
            'intialprice'              => $tierprice,
            'packageImageAlt'          => $this->image_alt,
            'packageImageCaption'      => $this->image_caption,
            'packageImage'             => $this->image,
            'packageOverview'          => $this->overview,
            'packageDuration'          => $this->duration,
            'packageNightsNumber'      => $this->nights_number,
            'additionalprice'           => $this->additional_price,
            'discountprecentage'           => $this->discount_precentage,
            'availabilities'            => PackageAbilities::collection( $this->packageAbilities ),
            'activities'            => PackageActivityBooing::collection( $this->packageCity ),
            // 'package_hotel'            => PackageHotelGtaResource::collection( $this->gtaHotel ),
            'package_hotel'            => PackageHotelGtaResource::collection( $getGtaHotels ),
            'packagePricePerPerson'    => $this->has_supplement ? ($this->price_per_person * 0.05) + $this->price_per_person : $this->price_per_person,
            'starting_airport'         => $this->starting_airport,
            'package_occupancy'         => intval($this->occupancy),
            'packageStartDate'         => $this->start_date,
            'packageIncludes'          => json_decode( $this->includes ) ?? [] ,
            'packageExcludes'          => json_decode( $this->excludes ) ?? [] ,
            // 'packageStartCity'         => $startCity,
            'isTop'                    => $this->is_top,
            'rank'                     => $this->rank,
            // 'packageCities'            => PackageCityResource::collection( $this->packageCity ),
            'start_days'               => array_filter(explode(',',$this->start_days)),
            // 'seasons'                  => $this->seasons,
            'packageMetaTitle'             => $this->seo_title,
            'packageMetaDesc'              => $this->meta_description,
            'packageImages'                => PackageImageResource::collection($this->packageImages),
            'cruise'                     => $this->cruise()->with('images')->first()
        ];
    }
}
