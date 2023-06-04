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
            'package_duration'                             => 'required|string',
            'package_price_per_person'                      => 'nullable',
            'solo_packageprice'                             => 'required',
            'Limo_packageprice'                             => 'required',
            'Caster_packageprice'                           => 'required',
            'HiAC_packageprice'                             => 'required',
            'bus_packageprice'                              => 'required',
            'children_percentage'                           => 'nullable',
            'additional_cost'                               => 'nullable',
            'expected_price'                                => 'nullable',
            'package_start_date'                            => 'nullable|date|date_format:Y-m-d',
            'package_includes'                              => 'nullable|array|min:1',
            'package_excludes'                              => 'nullable|array|min:1',
            'package_cities'                                => 'nullable|array|min:1',
            'package_cities.*.city_id'                      => 'nullable|exists:tour_cities,id',
            'package_cities.*.city_day_number'              => 'nullable|numeric |min:1',
            'package_cities.*.city_duration'                => 'nullable|string',
            'package_cities.*.room_id'                      => 'nullable|exists:package_hotel_rooms,id',

            'package_cities.*.activity'                     => 'nullable|array|min:1',
            'package_cities.*.activity.*.id'                => 'nullable|exists:package_activities,id',
            'package_cities.*.activity.*.day_number'        => 'required|numeric |min:1',
            //'package_cities.*.activity.*.day_date'             => 'nullable|date|date_format:Y-m-d|after_or_equal:today',

            'package_cities.*.transportation'               =>'nullable|array|min:1',
            'package_cities.*.transportation.*.type'        => ['nullable',Rule::in(PackageCityTransportation::transportationType)],
            'package_cities.*.transportation.*.date'        =>  'nullable',
            'package_cities.*.transportation.*.price_per_person'       =>  'nullable',
            'is_top'                                => 'nullable|boolean',
            'rank'                                => 'required_if:is_top,1|integer',
            'has_supplement'                      => 'boolean',
            'start_days'                          => 'array',
            'seasons'                             => 'array',
            'seasons.from'                        => 'nullable|date',
            'seasons.to'                          => 'nullable|date',
            'single_supplement_percentage'        => 'nullable|numeric',
            'image_alt'                           => 'nullable',
            'image_caption'                       => 'nullable',
            'meta_title'                          => 'nullable',
            'meta_desc'                           => 'nullable',
            'images'                              => 'array',
            'images.*.image'                      => 'nullable|image',
            'limo_children_percentage'            => 'nullable|numeric',
            'hiac_children_percentage'            => 'nullable|numeric',
            'caster_children_percentage'          => 'nullable|numeric',
            'bus_children_percentage'             => 'nullable|numeric',
            'cruise_id'                           => 'nullable|exists:cruises,id'
        ];

        if(request()->method() == 'POST'){
            $rules['package_image']  = 'required|image|max:2000';
        }else{
            $rules['slug'] = ['required',Rule::unique('packages','slug')->ignore($this->route('id'))];
        }


        return $rules;
    }
}
