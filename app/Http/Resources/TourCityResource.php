<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourCityResource extends JsonResource
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
            'CityID'            => $this->id,
            'CityName'          => $this->name,
            'CityDescription'   => $this->description,
            'CityCode'          => $this->code ,
            'CityCountryCode'   => $this->country_code,
            'CityCountryName'   => $this->country_name,
            'cityImage'         => $this->image,
            'cityImageAlt'      => $this->image_alt,
            'cityImageCaption'  => $this->image_caption,
            'citySlug'          => $this->slug,
            'citySEOTitle'      => $this->seo_title,
            'citySEODescription'=> $this->seo_description,
            'citySEOImage' => $this->featured_image != null ? asset('storage/'.$this->featured_image) : null
        ];
    }
}
