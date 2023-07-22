<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Constants\StatusConstants;

class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function guestRegister(GuestRegisterRequest $request)
    {
        $request->status = StatusConstants::STATUS_ACTIVE;
        return $this->userRepository->guestRegister($request);
    }
}