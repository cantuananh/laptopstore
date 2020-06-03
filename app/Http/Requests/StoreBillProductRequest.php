<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillProductRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            "quantity" => "required|numeric|max:10000000",
        ];
    }

    public function messages()
    {
        return [
            "quantity.required" => "Bạn phải nhập số lượng",
            "quantity.numeric" => "Số lượng phải là số",
            "quantity.max" => "Số lượng phải nhỏ hơn 10000000",
        ];
    }
}
