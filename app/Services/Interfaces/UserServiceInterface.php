<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Guest\GuestRegisterRequest;

interface UserServiceInterface
{
    public function guestRegister(GuestRegisterRequest $request);
    public function verifyEmail($email, $token);
    public function resetPassword($email, $token, $password);
    public function login($credentials, $remember);
    public function logout();
    public function openLockScreen($password);
    public function recover($email);

}