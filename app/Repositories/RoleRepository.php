<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use App\Exceptions\ApiException;

class RoleRepository implements RoleRepositoryInterface
{
    protected $model;
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        try {
            return $this->model->all();
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }

    }
}