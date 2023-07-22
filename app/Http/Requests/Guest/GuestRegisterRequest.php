<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class GuestRegisterRequest extends FormRequest
{
    public $email;
    public $username;
    public $password;
    public $status;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại.',
            'username.required' => 'Vui lòng nhập tên người dùng.',
            'username.unique' => 'Tên người dùng đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }

    public function guestRegister()
    {
        $this->email = $this->input('email');
        $this->username = $this->input('username');
        $this->status = 1;
        $this->password = Hash::make($this->input('password'));

        return $this;
    }
}