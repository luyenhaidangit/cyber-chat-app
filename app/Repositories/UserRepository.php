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
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function guestRegister(GuestRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'status' => $request->status,
                'email_verification_token' => $request->email_verification_token
            ]);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!.', $e->getMessage(), 500);
        }
    }

    public function update(User $user, array $data)
    {
        try {
            $user->update($data);
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!.', $e->getMessage(), 500);
        }
    }

    public function findOneByConditions(array $conditions)
    {
        try {
            $query = $this->model->newQuery();

            foreach ($conditions as $field => $value) {
                $query->where($field, $value);
            }

            return $query->first();
        } catch (Exception $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }
    }
}