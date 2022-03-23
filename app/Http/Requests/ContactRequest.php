<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'tel' => 'required',
            'email' => 'required|email',
            'notes' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '填表人欄位必填',
            'tel.required' => '電話欄位必填',
            'email.required' => 'E-mail欄位必填',
            'email.email' => 'E-mail格式不正確',
            'notes.required' => '留言內容欄位必填'
        ];
    }
}
