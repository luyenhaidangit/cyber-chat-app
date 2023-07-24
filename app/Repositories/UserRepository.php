<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\ApiException;

class UserRepository implements UserRepositoryInterface
{
    public function guestRegister(GuestRegisterRequest $request)
    {
        try {
            $user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'status' => $request->status,
                'email_verification_token' => $request->email_verification_token
            ]);

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!.', $e->getMessage(), 500);
        }
    }
}