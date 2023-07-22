<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Guest\GuestRegisterRequest;

interface UserRepositoryInterface
{
    public function guestRegister(GuestRegisterRequest $request);
}