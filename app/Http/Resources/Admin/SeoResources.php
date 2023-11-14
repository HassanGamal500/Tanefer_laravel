<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\PackageImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResources extends JsonResource
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
            'id' => $this->id,
            'page_name' => $this->page_name,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'slug' => $this->slug,
            'featured_image' => $this->featured_image != null ? asset('storage/'.$this->featured_image) : null

        ];
        return $data;
    }
}
