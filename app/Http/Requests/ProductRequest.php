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
            'product_ingredients' => 'String',
            'product_weight' => 'Integer',
            'product_content' => 'String',
            'product_image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }
}
