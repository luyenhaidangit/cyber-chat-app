<?php

namespace App\Services;

use App\Constants\RoleConstants;
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
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    protected $userRepository;
    protected $fileService;
    public function __construct(UserRepositoryInterface $userRepository, FileService $fileService)
    {
        $this->userRepository = $userRepository;
        $this->fileService = $fileService;
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
                $this->userRepository->attachRole($user, RoleConstants::ROLE_USER);
                Mail::to($request->email)->send(new VerifyUserEmail($user->email, $user->email_verification_token));
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
                throw new ApiException(null, true, 400, 'Xuất hiện lỗi không tìm thấy người dùng!');
            }

            return $user;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function login($credentials, $remember, $role)
    {
        try {
            if (Auth::attempt($credentials, $remember)) {
                $user = Auth::user();
                // if ($user->roles->contains('name', $role)) {
                //     return true;
                // }
                if ($user) {
                    return true;
                }
                Auth::logout();
                return false;
            }
            return false;
        } catch (ApiException $e) {
            throw new ApiException(null, false, 500, $e->getMessage());
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
        } catch (ApiException $e) {
            throw new ApiException(null, false, 500, $e->getMessage());
        }
    }

    public function openLockScreen($password)
    {
        try {
            if (Auth::check()) {
                if (Auth::attempt(['email' => Auth::user()->email, 'password' => $password])) {
                    return true;
                }
                return false;
            } else {
                return false;
            }
        } catch (ApiException $e) {
            throw new ApiException(null, false, 500, $e->getMessage());
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
                throw new ApiException(null, true, 400, 'Xuất hiện lỗi không tìm thấy người dùng!');
            }
            return true;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function findOneByConditions($conditions)
    {
        try {
            $user = $this->userRepository->findOneByConditions($conditions);
            return $user;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function delete($uuid)
    {
        $conditions = [
            'uuid' => $uuid
        ];
        try {
            $user = $this->userRepository->findOneByConditions($conditions);
            if ($user) {
                $result = $this->userRepository->delete($user->id);
                if ($result) {
                    return true;
                }
            }
            return false;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function create($data)
    {
        try {
            $data = array_merge($data, [
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($data['password']),
            ]);

            $user = $this->userRepository->create($data);

            if (isset($data['roles'])) {
                foreach ($data['roles'] as $roleId) {
                    $this->userRepository->attachRoleById($user, $roleId);
                }
            }

            return $user;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function editUser($id, array $data)
    {
        $user = $this->userRepository->findOneByConditions(['id' => $id]);

        if (!$user) {
            throw new ApiException('Người dùng không tồn tại!', null, 404);
        }

        try {
            $updatedUser = $this->userRepository->edit($user, $data);
            if (isset($data['roles'])) {
                $this->userRepository->syncRoles($updatedUser, $data['roles']);
            }
            return $updatedUser;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi cập nhật thông tin người dùng!', $e->getMessage(), $e->getCode());
        }
    }
}