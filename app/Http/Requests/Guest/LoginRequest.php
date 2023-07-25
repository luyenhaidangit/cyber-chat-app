<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
            'password.required' => 'Vui lòng nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = User::where('email', $this->email)->first();
            if ($user && is_null($user->email_verified_at)) {
                $validator->errors()->add('email', 'Email chưa được xác thực.');
            }
        });
    }
}