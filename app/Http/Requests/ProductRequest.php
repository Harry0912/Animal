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
            'product_ingredients' => 'nullable',
            'product_weight' => 'nullable|numeric',
            'product_content' => 'nullable',
            'on_sale' => '',
            'product_price' => 'nullable|numeric|required',
            'discount_price' => 'nullable|numeric',
            'product_image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => '請選擇產品類別',
            'product_title.required' => '產品名稱欄位必填',
            'product_intro.required' => '請選擇產品口味',
            'product_weight.numeric' => '重量欄位必須為數值',
            'product_price.required' => '價格欄位必填',
            'product_price.numeric' => '價格欄位必須為數值',
            'discount_price.numeric' => '特價欄位必須為數值',
            'product_image.mimes' => '圖片必須為jpeg,jpg,png,gif格式'
        ];
    }
}
