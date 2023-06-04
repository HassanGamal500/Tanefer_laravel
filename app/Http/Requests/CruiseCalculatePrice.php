<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CruiseCalculatePrice extends FormRequest
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
            'adults' => 'required|numeric',
            'children' => 'required|numeric',
            'start_date' => 'required|date|date_format:Y-m-d',
            'rooms'      => 'required|array',
            'rooms.*.room_id' => 'required|exists:package_hotel_rooms,id',
            'rooms.*.quantity' => 'required|integer'
        ];
    }
}
