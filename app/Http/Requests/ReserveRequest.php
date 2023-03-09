<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class ReserveRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'trip_id' => ['required'],
            'from_station_id' => ['required'],
            'to_station_id' => ['required'],
            'seat_id' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "trip_id.required"=>__('Trip  field is required'),
            "from_station_id.required"=>__('Start Station  field is required'),
            "to_station_id.required"=>__('End Station  field is required'),
            "seat_id.required"=>__('Seat  field is required'),

        ];
    }

    /**
     * Response on failure
     *
     * @param array $validator
     * @return Response
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(validationErrors($validator->errors()->all()));
    }
}
