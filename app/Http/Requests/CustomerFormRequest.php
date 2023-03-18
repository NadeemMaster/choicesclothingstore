<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email',
                'unique:customers'
            ],
            'contact_no' => [
                'required',
                'numeric',
                'unique:customers',
                'digits:11'
            ],
            'gender' => [
                'required'
            ],
            'dob' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'password' => [
                'required',
                Password::min(8)->mixedCase()->letters()->symbols()->uncompromised(),
                'confirmed'
            ],
        ];
    }
}
