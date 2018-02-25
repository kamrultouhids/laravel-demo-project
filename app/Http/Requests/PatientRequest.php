<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
        if(isset($this->patient)){
            return [
                'centre_id'              => 'required',
                'patient_code'            => 'required|unique:patient,patient_code,'.$this->patient.',patient_id',
                'patient_name'           => 'required',
                'visit_date'             => 'required',
                'phone_no'               => 'required|numeric|digits:10|unique:patient,phone_no,'.$this->patient.',patient_id',
                'alternative_phone_no'   => 'nullable|numeric|digits:10|unique:patient,alternative_phone_no,'.$this->patient.',patient_id',
                'birth_date'             => 'required',
                'marketing_person'       => 'required',

            ];
        }

        return [
            'centre_id'              => 'required',
            'patient_code'           => 'required|unique:patient',
            'patient_name'           => 'required',
            'visit_date'             => 'required',
            'phone_no'               => 'required|numeric|digits:10|unique:patient',
            'alternative_phone_no'   => 'nullable|numeric|digits:10|unique:patient',
            'birth_date'             => 'required',
            'marketing_person'       => 'required',
        ];
    }


    public function messages()
    {
        return [
            'phone_no.required' => 'The phone number field is required.',
            'phone_no.unique' => 'The phone number has already been taken.',
        ];
    }
}
