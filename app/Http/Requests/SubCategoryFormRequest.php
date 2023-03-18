<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryFormRequest extends FormRequest
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
            'category_id'=> [
                'required',
                'integer'
            ],
            'name'=> [
                'required',
                'string'
            ],
            'slug'=> [
                'required',
                'string'
            ],
            'description'=> [
                'required',
                'string'
            ],
            'image'=> [
                'required',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'meta_title'=> [
                'required',
                'string'
            ],
            'meta_description'=> [
                'required',
                'string'
            ],
            'meta_keywords'=> [
                'required',
                'string'
            ],
        ];
    }
}
