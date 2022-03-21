<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'type_id' => 'required',
            'product_title' => 'required',
            'product_intro' => 'required',
            'product_ingredients' => 'nullable|String',
            'product_weight' => 'nullable|Integer',
            'product_content' => 'nullable|String',
            'on_sale' => '',
            'product_price' => 'nullable|Integer|required',
            'discount_price' => 'nullable|Integer',
            'product_image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }
}
