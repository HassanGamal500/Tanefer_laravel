<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomCalculatePriceRequest extends FormRequest
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
            'date' => 'required|date|date_format:Y-m-d',
            'sesson'      => 'required|array',
            'sesson.*.adult' => 'required|integer',
            'sesson.*.child' => 'required|integer',
            'sesson.*.child_age' => 'nullable|integer'
        ];
    }
}
