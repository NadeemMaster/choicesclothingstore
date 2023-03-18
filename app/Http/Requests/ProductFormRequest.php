<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'subcategory_id'=> [
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
            'sku'=> [
                'required',
                'string',
                'unique:products'
            ],
            'small_description'=> [
                'required',
                'string'
            ],
            'description'=> [
                'required',
                'string'
            ],
            'image'=> [
                'required',
            ],
            'cost_price'=> [
                'required',
                'integer'
            ],
            'selling_price'=> [
                'required',
                'integer'
            ],
            'discounted_price'=> [
                'nullable',
                'integer'
            ],
            'discount_percent'=> [
                'nullable',
                'integer'
            ],
            'quantity'=> [
                'required',
                'integer'
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
