<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ParentRequest;
use App\Models\PackageCityTransportation;
use Illuminate\Validation\Rule;

class PackageRequest extends ParentRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'slug'                                         => 'required|unique:packages,slug',
            'package_occupancy'                            => 'nullable',
            'package_starting_airport'                     => 'nullable|string|',
            'package_title'                                => 'required|string|max:191',
            'package_image'                                => 'nullable|image|max:2000',
            'package_overview'                             => 'required',
            'package_nights_number'                        => 'required|integer',
            'package_duration'                             => 'required|integer',
            'package_price_per_person'                      => 'nullable',
            'additional_price'                              => 'nullable',
            'discount_precentage'                          => 'nullable',
            'availabilties'                                => 'required|array|min:1',
            'availabilties.*.from_date'                     => 'required|date|date_format:Y-m-d',
            'availabilties.*.to_date'                       => 'required|date|date_format:Y-m-d',
            'availabilties.*.days'                          => 'nullable|array',

            'activities'                                    => 'required|array|min:1',
            'activities.*.city_id'                          => 'required|exists:tour_cities,id',
            'activities.*.cruise_id'                        => 'nullable|exists:cruises,id',
            'activities.*.type'                             => 'required',
            'activities.*.days_number'                      => 'required|integer',
            'activities.*.days'                             => 'nullable|array',
            'activities.*.days.*.day_number'                => 'nullable',
            'activities.*.days.*.adventrues'                => 'nullable|array',
            'activities.*.days.*.adventrues.*.adventrue_id' => 'nullable',
            'activities.*.transportation'                   => 'nullable|array',
            'activities.*.transportation.*.type'            => ['nullable',Rule::in(PackageCityTransportation::transportationType)],
            'activities.*.transportation.*.price_per_person' => 'nullable',
            'package_includes'                              => 'nullable|array|min:1',
            'package_excludes'                              => 'nullable|array|min:1',
            // 'package_cities'                                => 'nullable|array|min:1',
            // 'package_cities.*.city_id'                      => 'nullable|exists:tour_cities,id',
            // 'package_cities.*.city_day_number'              => 'nullable|numeric |min:1',
            // 'package_cities.*.min_days'                     => 'nullable|string',
            // 'package_cities.*.room_id'                      => 'nullable|exists:package_hotel_rooms,id',

            // 'package_cities.*.activity'                     => 'nullable|array|min:1',
            // 'package_cities.*.activity.*.id'                => 'nullable|exists:package_activities,id',
            // 'package_cities.*.activity.*.day_number'        => 'required|numeric |min:1',
            // 'package_cities.*.transportation'               =>'nullable|array|min:1',
            // 'package_cities.*.transportation.*.type'        => ['nullable',Rule::in(PackageCityTransportation::transportationType)],
            // 'package_cities.*.transportation.*.date'        =>  'nullable',
            // 'package_cities.*.transportation.*.price_per_person'       =>  'nullable',
            'is_top'                                => 'nullable|boolean',
            'rank'                                => 'required_if:is_top,1|integer',
            'has_supplement'                      => 'boolean',
            'start_days'                          => 'array',
            'seasons'                             => 'array',
            'seasons.from'                        => 'nullable|date',
            'seasons.to'                          => 'nullable|date',
            'image_alt'                           => 'nullable',
            'image_caption'                       => 'nullable',
            'meta_title'                          => 'nullable',
            'meta_desc'                           => 'nullable',
            'images'                              => 'array',
            'images.*.image'                      => 'nullable|image',
            'cruise_id'                           => 'nullable|exists:cruises,id'
        ];

        if(request()->method() == 'POST'){
            $rules['package_image']  = 'nullable|image|max:2000';
        }else{
            $rules['slug'] = ['required',Rule::unique('packages','slug')->ignore($this->route('id'))];
        }


        return $rules;
    }
}
