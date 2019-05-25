<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'location_id' => 'numeric',
            'user_id' => 'numeric',
            'name' => 'string',
            'surname' => 'string',
            'email' => 'email',
            'phone' => 'string',
            'date' => 'string',
            'time' => 'string',
            'duration' => 'string',
            'adult' => 'boolean',
            'more' => 'string',
        ];
    }
}
