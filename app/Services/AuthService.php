<?php

namespace App\Services;

use App\Constants\RoleConstants;
use App\Constants\StatusConstants;
use App\Exceptions\CyberException;
use App\Mail\ForgotPasswordUserEmail;
use App\Mail\VerifyUserEmail;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
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
    public function verifyEmail($email, $token)
    {
        try {
            $user = $this->userRepository->findOneByConditions([
                'email' => $email,
                'email_verification_token' => $token
            ]);

            if ($user && !is_null($user->email_verified_at)) {
                throw new CyberException('Email đã được kích hoạt từ trước.');
            }

            if ($user && is_null($user->email_verified_at)) {
                $this->userRepository->update($user, [
                    'email_verification_token' => null,
                    'email_verified_at' => Carbon::now(),
                ]);
            }

            return $user;
        } catch (CyberException $e) {
            return $e;
        }
    }
    public function recover($email)
    {
        try {
            $user = $this->userRepository->findOneByConditions([
                'email' => $email
            ]);

            if ($user) {
                $this->userRepository->update($user, [
                    'email_verification_token' => Str::random(40)
                ]);

                Mail::to($email)->send(new ForgotPasswordUserEmail($user->email, $user->email_verification_token));

            } else {
                throw new CyberException('Lỗi không thể tìm thấy người dùng!');
            }
            return true;
        } catch (CyberException $e) {
            return $e;
        }
    }
    public function resetPassword($email, $token, $password)
    {
        try {
            $user = $this->userRepository->findOneByConditions([
                'email' => $email,
                'email_verification_token' => $token,
            ]);

            if ($user) {
                $this->userRepository->update($user, [
                    'email_verification_token' => null,
                    'password' => Hash::make($password),
                    'email_verified_at' => $user->email_verified_at ?: Carbon::now()
                ]);
            } else {
                throw new CyberException('Lỗi không thể tìm thấy người dùng!');
            }

            return $user;
        } catch (CyberException $e) {
            return $e;
        }
    }

    public function changePassword($old_password, $new_password)
    {
        $user = $this->userRepository->findOneByConditions(['id' => Auth::user()->id]);

        if (!Hash::check($old_password, $user->password)) {
            return false;
        }

        $this->userRepository->update($user, [
            'password' => Hash::make($new_password)
        ]);

        return true;
    }
}