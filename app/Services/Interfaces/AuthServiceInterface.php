<?php

namespace App\Services\Interfaces;

interface AuthServiceInterface
{
    public function login($credentials, $remember);
    public function logout();
    public function registerCustomer($data);
}