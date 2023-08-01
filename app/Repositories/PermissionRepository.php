<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use App\Exceptions\ApiException;
use Exception;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $model;
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        try {
            return $this->model->with('children')->whereNull('code_parent')->get();
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }
    }
}