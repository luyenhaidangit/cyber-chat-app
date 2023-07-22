<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function guestRegister(GuestRegisterRequest $request)
    {
        return User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'status' => $request->status,
            'email_verification_token' => $request->email_verification_token
        ]);
    }
}