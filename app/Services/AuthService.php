<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function login($credentials, $remember)
    {
        if (Auth::attempt($credentials, $remember)) {
            return true;
        }
        return false;
    }
}