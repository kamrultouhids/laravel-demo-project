<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhysiotherapistRequest extends FormRequest
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

        if(isset($this->physiotherapist)){
            return [
                'email'             => 'required|unique:user,email,'.$this->physiotherapist.',user_id',
                'phone'             => 'required|numeric|digits:10|unique:user,phone,'.$this->physiotherapist.',user_id',
                'name'              => 'required',
                'centre_id'         => 'required',
            ];
        }
        return [
            'email'             => 'required|unique:user',
            'phone'             => 'required|numeric|digits:10|unique:user',
            'name'              => 'required',
            'password'          => 'required|confirmed',
            'centre_id'         => 'required',
        ];

    }

    public function messages()
    {
        return [
            'centre_id.required' => 'The centre field is required.',
        ];
    }
}
