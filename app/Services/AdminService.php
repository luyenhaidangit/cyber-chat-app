<?php

namespace App\Services;

use App\Services\Interfaces\AdminServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AdminService implements AdminServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}