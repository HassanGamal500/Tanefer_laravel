<?php

namespace App\Http\Requests;

use App\Models\PackageHotelRoom;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CruiseRequest extends FormRequest
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
        $rules =  [
            'name' => 'required',
            'cruise_line' => 'nullable',
            'ship_name'   => 'nullable',
            'facilities'  => 'nullable|array',
            'start_city_id' => 'required|exists:tour_cities,id',
            'cities_ids'    => 'required|array',
            'cities_ids.*'  => 'required|exists:tour_cities,id',
            'description' => 'nullable',
            'policies'    => 'nullable|array',
            'excludes'    => 'nullable|array',
            'includes'    => 'nullable|array',
            'stars'       => 'required|integer',
            'images'       => 'nullable|array',
            'images.*'     => 'image',
            'rooms'        => 'required|array',
            'rooms.*.type'                      =>'required|string|max:255',
            'rooms.*.occupancy'                 =>['required',Rule::in(PackageHotelRoom::cruiseRoomOccupancy)],
            'rooms.*.inclusions'                =>'required|array',
            'rooms.*.amenities'                 =>'nullable|array',
            'rooms.*.categories'                 =>'required|array',
            'rooms.*.max_num_adult'             =>'required|numeric',
            'rooms.*.max_num_children'          =>'required|numeric',
            'number_of_nights'                  => 'required|integer',
            'start_days'                        => 'nullable|array'
        ];

        if(request()->method() == 'POST'){
            $rules['master_image']  = 'required|image|max:2000';
            $rules['rooms.*.seasons'] = 'required|array';
            $rules['rooms.*.seasons.*.id'] = 'required|exists:package_hotel_seasons,id';
            $rules['rooms.*.seasons.*.price_per_person'] = 'required|numeric';
        }else{
            $rules['master_image']  = 'nullable|image|max:2000';
        }

        return $rules;
    }
}
