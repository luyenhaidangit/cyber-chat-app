<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Guest\GuestRegisterRequest;

interface UserServiceInterface
{
    public function guestRegister(GuestRegisterRequest $request);
    public function verifyEmail($email, $token);
    public function forgotPassword($email);
}