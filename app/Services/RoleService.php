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
}