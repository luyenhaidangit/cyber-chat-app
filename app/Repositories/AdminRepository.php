<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\ApiException;
use Illuminate\Support\Carbon;

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

            if (isset($conditions['username'])) {
                $query->where('username', 'like', '%' . $conditions['username'] . '%');
            }

            if (isset($conditions['email'])) {
                $query->where('email', 'like', '%' . $conditions['email'] . '%');
            }

            if (isset($conditions['status'])) {
                $query->where('status', $conditions['status']);
            }

            if (isset($conditions['startDate'])) {
                $startDate = Carbon::createFromFormat('d-m-Y', $conditions['startDate'])->format('Y-m-d');
                $query->whereDate('created_at', '>=', $startDate);
            }

            if (isset($conditions['endDate'])) {
                $endDate = Carbon::createFromFormat('d-m-Y', $conditions['endDate'])->format('Y-m-d');
                $query->whereDate('created_at', '<=', $endDate);
            }

            if (isset($conditions['roles']) && is_array($conditions['roles']) && count($conditions['roles']) > 0) {
                $query->whereHas('roles', function ($roleQuery) use ($conditions) {
                    $roleQuery->whereIn('role_id', $conditions['roles']);
                });
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