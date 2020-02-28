<?php

namespace App\Http\Requests;

use App\Rules\lengStringRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "ram" => "required|numeric",
            "microprocessors" => "required|numeric",
            "screen" => "required|numeric",
            "quantity" => "required|numeric",
            "guarantee_time" => "required|numeric",
            'image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            "image.mimes" => "Ảnh không đúng định dạng",
            "name.required" => "Bạn phải nhập tên sản phẩm",
            "description.required" => "Bạn phải nhập mô tả",
            "description.max" => "Mô tả có độ dài không quá 250 kí tự",
            "price.required" => "Bạn phải nhập đơn giá",
            "price.numeric" => "Đơn giá phải là số",
            "ram.required" => "Bạn phải nhập dung lượng ram",
            "ram.numeric" => "Dung lượng mãi phải là số",
            "screen.required" => "Bạn phải nhập độ rộng màn hình",
            "screen.numeric" => "Độ rộng màn hình phải là số",
            "quantity.required" => "Bạn phải nhập số lượng",
            "quantity.numeric" => "Số lượng phải là số",
            "guarantee_time.required" => "Bạn phải nhập thời gian bảo hành",
            "guarantee_time.numeric" => "Thời gian bảo hành phải là số",
            "microprocessors.required" => "Bạn phải nhập vi xử lý",
            "microprocessors.numeric" => "Vi xử lý phải là số",
        ];
    }
}
