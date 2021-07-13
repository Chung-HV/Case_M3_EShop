<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|alpha|max:255|min:5',
            'email' => 'required|regex:/^[A-Za-z0-9]+[A-Za-z0-9._]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/|unique:users|',
            'password' => 'required|Confirmed|min:6|max:15',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.alpha' => ' Tên chỉ được chứa chữ cái',
            'name.max' => 'Tên quá dài',
            'name.min' => 'Tên quá ngắn',
            'email.required' => 'email không được để trống',
            'email.regex' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required'=>'Mật khẩu không được để trống',
            'password.Confirmed'=>'Mật khẩu nhập lại không khớp',
            'password.max' => 'Mật khẩu quá dài',
            'password.min' => 'Mật khẩu quá ngắn',
        ];
    }
}

