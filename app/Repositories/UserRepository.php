<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Models\User;
use App\Models\Role;
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
    public function attachRole(User $user, $name)
    {
        $role = Role::where('name', $name)->first();
        try {
            if ($role) {
                $user->roles()->attach($role->id);
            } else {
                throw new ApiException('Vai trò không tồn tại!', null, 404);
            }
        } catch (ApiException $e) {
            dd($e->getMessage());
            // throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }
    }
    public function attachRoleById(User $user, $id)
    {
        $user->roles()->attach($id);
    }

    public function delete($userId)
    {
        $user = $this->model->find($userId);

        if (!$user) {
            return false;
        }

        $user->delete();

        return true;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function edit(User $user, array $data)
    {
        DB::beginTransaction();
        try {
            $user->update($data);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), 500);
        }
    }

    public function syncRoles(User $user, array $roles)
    {
        $user->roles()->sync($roles);
    }
}