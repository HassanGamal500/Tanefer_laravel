<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminHotelBookingListController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->isJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'date',
            'end_date'   => 'date',
            'client_id'  => 'exists:clients,id',
            'hotel_booking_status_id' => 'exists:hotel_booking_statuses,id',
            'payment_status_id' => 'exists:payment_statuses,id',
            'per_page' => 'integer'
        ];
    }
}
