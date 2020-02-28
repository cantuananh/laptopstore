<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|max:155',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bạn chưa nhập tên thể loại",
            "name.max" => "Tên thể loại không quá 155 kí tự",
            "description.required" => "Bạn chưa nhập mô tả",
            "description.max" => "Mô tả không quá 255 kí tự",

        ];
    }
}
