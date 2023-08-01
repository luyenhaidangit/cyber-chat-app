<?php

namespace App\Services;

use App\Services\Interfaces\RoleServiceInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Exceptions\ApiException;

class RoleService implements RoleServiceInterface
{
    protected $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll()
    {
        try {
            $data = $this->roleRepository->getAll();
            return $data;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), $e->getCode());
        }
    }

    public function editRole($id, array $data)
    {
        $user = $this->roleRepository->findOneByConditions(['id' => $id]);

        if (!$user) {
            throw new ApiException('Người dùng không tồn tại!', null, 404);
        }

        try {
            $updatedUser = $this->roleRepository->update($user, $data);

            return $updatedUser;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi cập nhật thông tin người dùng!', $e->getMessage(), $e->getCode());
        }
    }

    public function findOneByConditions($conditions)
    {
        try {
            $user = $this->roleRepository->findOneByConditions($conditions);
            return $user;
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }
}