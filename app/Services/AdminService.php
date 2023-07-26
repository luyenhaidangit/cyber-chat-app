<?php

namespace App\Services;

use App\Services\Interfaces\AdminServiceInterface;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Exceptions\ApiException;

class AdminService implements AdminServiceInterface
{
    protected $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function get($pageIndex, $pageSize, $conditions)
    {
        try {
            $data = $this->adminRepository->get($pageIndex, $pageSize, $conditions);
            return $data;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), $e->getCode());
        }
    }
}