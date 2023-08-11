<?php

namespace App\Services\Interfaces;

interface AuthServiceInterface
{
    public function login($credentials, $remember);
    public function logout();
    public function registerCustomer($data);
    public function verifyEmail($email, $token);
    public function recover($email);
    public function resetPassword($email, $token, $password);
}