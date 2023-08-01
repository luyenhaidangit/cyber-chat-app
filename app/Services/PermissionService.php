<?php

namespace App\Services;

use App\Services\Interfaces\PermissionServiceInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;

use App\Exceptions\ApiException;

class PermissionService implements PermissionServiceInterface
{
    protected $permissionRepository;
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAll()
    {
        try {
            $data = $this->permissionRepository->getAll();
            return $data;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), $e->getCode());
        }
    }
}