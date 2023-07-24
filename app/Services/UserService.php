<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Constants\StatusConstants;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyUserEmail;
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
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), 500);
        }
    }

    public function verifyEmail($email, $token)
    {
        try {
            $user = $this->userRepository->findOneByConditions([
                'email' => $email,
                'email_verification_token' => $token
            ]);

            if ($user) {
                $this->userRepository->update($user, [
                    'email_verified_at' => Carbon::now(),
                ]);
            }

            return $user;
        } catch (Exception $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý logic!', $e->getMessage(), 500);
            // throw new Exception();
        }
    }
}