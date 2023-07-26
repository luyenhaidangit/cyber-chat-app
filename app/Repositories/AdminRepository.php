<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\ApiException;

class AdminRepository implements AdminRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function get($pageIndex, $pageSize, $conditions)
    {
        try {
            $offset = ($pageIndex - 1) * $pageSize;

            $query = User::query();

            if (isset($conditions['name'])) {
                $query->where('name', 'like', '%' . $conditions['name'] . '%');
            }

            if (isset($conditions['email'])) {
                $query->where('email', 'like', '%' . $conditions['email'] . '%');
            }

            if (isset($conditions['status'])) {
                $query->where('status', $conditions['status']);
            }

            if (isset($conditions['startDate']) && isset($conditions['endDate'])) {
                $query->whereBetween('created_at', [$conditions['startDate'], $conditions['endDate']]);
            }

            $query->orderByDesc('created_at');

            $totalRecords = $query->count();

            $users = $query->skip($offset)->take($pageSize)->get();

            return [
                'data' => $users,
                'total_records' => $totalRecords,
                'page_index' => $pageIndex,
                'page_size' => $pageSize
            ];
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }

    }
}