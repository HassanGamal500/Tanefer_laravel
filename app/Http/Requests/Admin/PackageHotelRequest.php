<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ParentRequest;
use App\Models\PackageHotelRoom;
use Illuminate\Validation\Rule;

class PackageHotelRequest extends ParentRequest
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
            'hotel_name'              => 'required|string|max:191',
            'hotel_address'           => 'required',
            'hotel_description'       => 'required',
            'hotel_facilities'        => 'required|array',
            'hotel_latitude'          => 'nullable',
            'hotel_longitude'         => 'nullable',
            'hotel_policies'          => 'required|array',
            'hotel_stars'             => 'required|numeric',
            'hotel_phone'             => 'required',
            'hotel_city_id'           => 'required|exists:tour_cities,id',
            'hotel_image'             => 'nullable|image|max:2000',
            'hotel_images'            =>'nullable|array',
            'hotel_images.*'          =>'nullable|image|max:2000',
            'rooms'                             => 'required|array',
            'rooms.*.type'                      =>'required|string|max:255',
            'rooms.*.occupancy'                 =>['required',Rule::in(PackageHotelRoom::roomOccupancy)],
            'rooms.*.inclusions'                =>'required|array',
            'rooms.*.amenities'                 =>'nullable|array',
            'rooms.*.categories'                 =>'required|array',
            'rooms.*.max_num_adult'             =>'required|numeric',
            'rooms.*.max_num_children'          =>'required|numeric',
            'rooms.*.price_per_day'             =>'nullable',

        ];
        if(request()->method() == 'POST'){
            $rules['hotel_image']  = 'required|image|max:2000';
            $rules['rooms.*.seasons'] = 'required|array';
            $rules['rooms.*.seasons.*.id'] = 'required|exists:package_hotel_seasons,id';
            $rules['rooms.*.seasons.*.price_per_person'] = 'required|numeric';
        }


        return $rules ;
    }

    public function messages()
    {
        return [
            'hotel_images.*.max' => 'The Hotel Images exceeds 2 MB'
        ];
    }
}

