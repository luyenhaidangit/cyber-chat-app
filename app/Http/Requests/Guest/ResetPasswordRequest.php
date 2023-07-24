<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
        ];
    }
}