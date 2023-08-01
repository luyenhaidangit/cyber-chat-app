<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use App\Exceptions\ApiException;
use Exception;
use Illuminate\Support\Facades\DB;

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
            return $this->model->orderByDesc('id')->get();
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }
    }
    // public function update(Role $role, array $data)
    // {
    //     try {
    //         $role->update($data);
    //         return $role;
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!.', $e->getMessage(), 500);
    //     }
    // }

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