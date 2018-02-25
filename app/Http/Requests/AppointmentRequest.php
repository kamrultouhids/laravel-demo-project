<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'centre_id'          => 'required',
            'physiotherapist_id' => 'required',
            'patient_id'         => 'required',
            'treatment_status'   => 'required',
            'appointment_date'   => 'required',
            'appointment_time'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'centre_id.required'            => 'The centre field is required.',
            'physiotherapist_id.required'   => 'The physiotherapist field is required.',
            'patient_id.required'           => 'The patient field is required.',
        ];
    }

}
