<?php

namespace App\Http\Requests;

use App\Models\PackageCityTransportation;
use App\Rules\InfantNumber;
use App\Rules\PackageTotalPrice;
use App\Rules\PassengerSum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingSaveRequest extends FormRequest
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
        return  [
            'numberOfRooms' => 'required|integer',
            'roomGuests'    => 'required|array',
            'roomGuests.*.adults' => 'required|integer',
            'roomGuests.*.children' => 'required|integer',
            "package_id"                                => "required|exists:packages,id",
            "city_start"                                => "required ",
            "city_end"                                  => "required ",
            "total_price"                               => "required ",
            "booking_cities"                            => "required|array|min:1",
            "booking_cities.*.city_id"                  => "required|exists:tour_cities,id",
            "booking_cities.*.nights_number"            => "required|numeric ",
            "booking_cities.*.transportation_type"      => ['nullable',Rule::in(PackageCityTransportation::transportationType)],
            "booking_cities.*.transportation_amount"     => 'nullable',
            "booking_cities.*.transportation_flight_id"  => 'nullable',
            "booking_cities.*.room_id"                  => " nullable|exists:package_hotel_rooms,id",
            "booking_cities.*.activity"                 => " array",
            "booking_cities.*.activity.*.activityID"            => " required|exists:package_activities,id",
            "booking_cities.*.activity.*.day_number"    => " required|numeric |min:1",
            "singleSupplement"                          => 'nullable|boolean',
            'booking_cities.*.hotelRooms'               => 'array',
            'booking_cities.*.hotelRooms.*.roomID'                   => 'nullable|exists:package_hotel_rooms,id',
            'booking_cities.*.hotelRooms.*.roomType'                 => 'nullable',
            'booking_cities.*.hotelRooms.*.roomOccupancy'            => 'nullable',
            'booking_cities.*.hotelRooms.*.roomMaxNumberOfAdult'     => 'nullable|numeric',
            'booking_cities.*.hotelRooms.*.roomMaxNumberOfChildren'  => 'nullable|numeric',
            'booking_cities.*.hotelRooms.*.selectionNumber'          => 'nullable|numeric',
            "sessionId"                                 => 'required',
       ];
    }
}
