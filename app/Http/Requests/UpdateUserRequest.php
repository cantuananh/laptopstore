<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->user,
            'name' => 'required|max:250',
            'address' => 'required|max:250',
            'phone' => 'required',
            'birthday' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            "image.mimes" => "Ảnh không đúng định dạng",
            "email.unique" => "Email đã tồn tại",
            "email.email" => "Chưa đúng định dạng email",
            "email.required" => "Bạn phải nhập email",
            "name.required" => "Bạn phải nhập tên",
            "name.max" => "Tên không quá 250 kí tự",
            "phone.required" => "Bạn phải nhập số điện thoại",
            "birthday.required" => "Bạn phải nhập ngày sinh",
            "address.required" => "Bạn phải nhập địa chỉ",
            "address.max" => "Địa chỉ không quá 250 kí tự",
        ];
    }
}
