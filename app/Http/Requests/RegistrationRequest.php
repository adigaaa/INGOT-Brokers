<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country_code' => 'required|numeric',
            'phone_code' => ['required', 'numeric', Rule::unique('users')
                ->where('country_code',$this->request->get('country_code'))
                ->where('phone_code',$this->request->get('phone_code'))
            ],
            'date_of_birth' => 'nullable|date|date_format:Y-m-d',
            'password' => 'required|confirmed|min:8|alpha_num',
            'image' => 'required|max:5000|mimes:jpg,jpeg,png',
        ];
    }
}
