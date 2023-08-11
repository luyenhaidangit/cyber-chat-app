<?php

namespace App\Services;

use App\Constants\RoleConstants;
use App\Constants\StatusConstants;
use App\Mail\VerifyUserEmail;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\Interfaces\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function login($credentials, $remember)
    {
        if (Auth::attempt($credentials, $remember)) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        Auth::logout();
        if (session('lock_screen')) {
            session(['lock_screen' => false]);
        }
        session()->invalidate();
        session()->regenerateToken();
    }
    public function registerCustomer($data)
    {
        $data = array_merge($data, [
            'status' => StatusConstants::STATUS_ACTIVE,
            'password' => Hash::make($data['password']),
            'email_verification_token' => Str::random(40),
        ]);

        $user = $this->userRepository->create($data);

        if ($user) {
            $this->userRepository->attachRoleById($user, RoleConstants::ROLE_USER);
            Mail::to($user->email)->send(new VerifyUserEmail($user->email, $user->email_verification_token));
        }

        return $user;
    }
}