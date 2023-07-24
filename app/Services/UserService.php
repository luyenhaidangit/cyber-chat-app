<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Constants\StatusConstants;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyUserEmail;
use App\Mail\ForgotPasswordUserEmail;
use Illuminate\Support\Str;
use Exception;
use App\Exceptions\ApiException;
use Illuminate\Support\Carbon;

class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function guestRegister(GuestRegisterRequest $request)
    {
        $request->merge([
            'status' => StatusConstants::STATUS_ACTIVE,
            'password' => Hash::make($request->input('password')),
            'email_verification_token' => Str::random(40),
        ]);

        try {
            $user = $this->userRepository->guestRegister($request);

            if ($user) {
                Mail::to($request->email)->send(new VerifyUserEmail($user->email_verification_token));
            }

            return $user;
        } catch (Exception $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), $e->getCode());
        }
    }

    public function verifyEmail($email, $token)
    {
        try {
            $user = $this->userRepository->findOneByConditions([
                'email' => $email,
                'email_verification_token' => $token
            ]);

            if ($user && !is_null($user->email_verified_at)) {
                throw new ApiException($user, true, 200, 'Email người dùng đã kích hoạt trước đó!');
            }

            if ($user && is_null($user->email_verified_at)) {
                $this->userRepository->update($user, [
                    'email_verification_token' => null,
                    'email_verified_at' => Carbon::now(),
                ]);
            }

            return $user;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function forgotPassword($email)
    {
        try {
            $user = $this->userRepository->findOneByConditions([
                'email' => $email
            ]);

            if ($user) {
                $this->userRepository->update($user, [
                    'email_verification_token' => Str::random(40)
                ]);

                Mail::to($email)->send(new ForgotPasswordUserEmail($user->email_verification_token));

            } else {
                throw new ApiException(null, true, 400, 'Người dùng với email không tồn tại!');
            }

            return $user;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }
}