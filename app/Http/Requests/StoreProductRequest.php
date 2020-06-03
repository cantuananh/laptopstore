<?php

namespace App\Http\Requests;

use App\Rules\lengStringRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            "name" => ['required', new lengStringRule()],
            "description" => "required|max:250",
            "price" => "required|numeric",
            "ram" => "required",
            "microprocessors" => "required",
            "screen" => "required",
            "quantity" => "required|numeric",
            "guarantee_time" => "required|numeric",
            'image' => 'mimes:jpeg,jpg,png,gif|required'
        ];
    }

    public function messages()
    {
        return [
            "image.mimes" => "Ảnh không đúng định dạng",
            "image.required" => "Bạn phải nhập ảnh",
            "name.required" => "Bạn phải nhập tên sản phẩm",
            "description.required" => "Bạn phải nhập mô tả",
            "description.max" => "Mô tả có độ dài không quá 250 kí tự",
            "price.required" => "Bạn phải nhập đơn giá",
            "price.numeric" => "Đơn giá phải là số",
            "ram.required" => "Bạn phải nhập dung lượng ram",
            "screen.required" => "Bạn phải nhập độ rộng màn hình",
            "quantity.required" => "Bạn phải nhập số lượng",
            "quantity.numeric" => "Số lượng phải là số",
            "guarantee_time.required" => "Bạn phải nhập thời gian bảo hành",
            "guarantee_time.numeric" => "Thời gian bảo hành phải là số",
            "microprocessors.required" => "Bạn phải nhập vi xử lý",
        ];
    }
}
