<?php

namespace App\Http\Requests;

use App\Rules\AvailableRoomInHotelPackage;
use App\Rules\SingleTravllerNumber;
use Illuminate\Foundation\Http\FormRequest;

class PackageCalculateTotalPriceRequest extends FormRequest
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
        return [
            'startDate' => 'required|date',
            'numberOfRooms' => 'required|integer',
            'roomGuests'    => ['required','array'],
            'roomGuests.*.adults' => 'required|integer',
            'roomGuests.*.children' => 'required|integer',
            "package_id" => 'required|exists:packages,id',
            'added_activities' => 'nullable|array',
            'removed_activities' => 'nullable|array',
            'singleSupplement' => 'boolean',
            'single_travellers_num' => ['nullable',new SingleTravllerNumber($this->roomGuests)],
            'packageCities'    => 'required|array',
            'packageCities.*.cityDaysNumber' => 'required|numeric',
            'packageCities.*.cityDuration' => 'required|numeric',
            'packageCities.*.cityID'         => 'required|exists:tour_cities,id',
            'packageCities.*.hotelID'        => ['nullable','exists:package_hotels,id',new AvailableRoomInHotelPackage($this->roomGuests)],
            'packageCities.*.hotelRooms'     => 'array',
            'packageCities.*.hotelRooms.*.roomID' => 'nullable|exists:package_hotel_rooms,id',
            'packageCities.*.hotelRooms.*.roomMaxNumberOfAdult' => 'nullable|numeric',
            'packageCities.*.hotelRooms.*.roomMaxNumberOfChildren' => 'nullable|numeric',
            'packageCities.*.hotelRooms.*.selectionNumber' => 'required|numeric|min:1',
            'packageCities.*.hotelRooms.*.roomSeason.roomSeasonID' => 'nullable|exists:package_hotel_room_seasons,id',
            'packageCities.*.hotelRooms.*.roomSeason.roomSeasonPricePerDay' => 'nullable|numeric',
            'cruise_id'                                                     => 'nullable|exists:cruises,id'
        ];
    }
}
