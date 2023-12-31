<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function guestRegister(GuestRegisterRequest $request);
    public function update(User $model, array $data);
    public function findOneByConditions(array $conditions);
    public function attachRole(User $model, $name);
    public function attachRoleById(User $user, $id);
    public function delete($userId);
    public function create($data);
    public function edit(User $user, array $data);
    public function syncRoles(User $user, array $roles);
}