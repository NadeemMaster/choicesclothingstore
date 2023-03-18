<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'image'=> [
                'required',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'strongtitle'=> [
                'nullable',
                'string'
            ],
            'title'=> [
                'nullable',
                'string'
            ],
            'description'=> [
                'nullable',
                'string'
            ],

            'link'=> [
                'nullable',
                'string'
            ],
        ];
    }
}
