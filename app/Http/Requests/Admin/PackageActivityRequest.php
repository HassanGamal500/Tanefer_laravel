<?php

namespace App\Http\Requests\Admin;

use App\Models\PackageActivity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\ParentRequest;

class PackageActivityRequest extends ParentRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'activity_title'                => 'required|string|max:191',
            'activity_overview'             => 'required',
            'activity_intro'             => 'required',
            'activity_itinerary'             => 'required',
            'activity_end_time'             => 'required|date_format:H:i',
            'activity_includes'             => 'required|array',
            'activity_excludes'             => 'required|array',
            'activity_city_id'              => 'required|exists:tour_cities,id',
            'activity_image'                => 'nullable',
            // 'activity_price_per_person'     => 'required',
            'activity_duration_digits'      => 'required|integer|min:1',
            // 'activity_duration_type'        => ['required',Rule::in(PackageActivity::activityDurationType)],
            'activity_type'                 => ['required',Rule::in(PackageActivity::activityType)],
            // 'activity_pax_min_number'       => 'required|integer|min:1',
            'side_activity'                 => ['requiredIf:activity_type,camping','array'],
            'side_activity.*.name'          =>'required|string|max:191',
            'side_activity.*.time'          =>'required',
            'side_activity.*.day_number'    =>'required|integer|min:1',
            'is_published'                  =>'required|boolean',
            'availabilities.*.from_date'                     =>'required|date',
            'availabilities.*.to_date'                       =>'required|date',
            'availabilities.*.pricingtiers.*.name'             =>'required|string|max:191',
            'availabilities.*.pricingtiers.*.min'              =>'required|integer|min:1',
            'availabilities.*.pricingtiers.*.max'              =>'required|integer|max:99',
            'availabilities.*.pricingtiers.*.adult_price'      =>'required|numeric',
            'availabilities.*.pricingtiers.*.child_percentage' =>'required|numeric',
            'start_days'                    => 'array',
            'activity_start_time'           => 'required|date_format:H:i'
            // 'seasons'                             => 'array',
            // 'seasons.from'                        => 'nullable|date',
            // 'seasons.to'                          => 'nullable|date',
            // 'solo_price'                          => 'required|numeric',
            // 'Limo_price'                          => 'required|numeric',
            // 'HiAC_price'                          => 'required|numeric',
            // 'Caster_price'                          => 'required|numeric',
            //  'bus_price'                          => 'required|numeric',
            //  'single_supplement_percentage'        => 'nullable|numeric',
            //  'children_percentage'                 => 'nullable|numeric',
            //   'limo_children_percentage'            => 'nullable|numeric',
            //  'hiac_children_percentage'            => 'nullable|numeric',
            //  'caster_children_percentage'          => 'nullable|numeric',
            //  'bus_children_percentage'             => 'nullable|numeric'
        ];
        //if(request()->method() == 'POST')
          //  $rules['activity_image']  = 'required|image|max:2000';

        return  $rules;
    }

    public function messages()
    {
        return [
            'availabilities.*.pricingtiers.*.name.required' => 'name is required',
            'availabilities.*.pricingtiers.*.min.required' => 'min is required',
            'availabilities.*.pricingtiers.*.max.required' => 'max is required',
            'availabilities.*.pricingtiers.*.adult_price.required' => 'adult_price is required',
            'availabilities.*.pricingtiers.*.child_percentage.required' => 'child_percentage is required',
        ];
    }
}
