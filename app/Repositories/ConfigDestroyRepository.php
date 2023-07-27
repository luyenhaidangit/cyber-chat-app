<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ConfigDestroyRepositoryInterface;
use App\Models\ConfigDestroy;
use App\Exceptions\ApiException;
use Illuminate\Support\Carbon;

class ConfigDestroyRepository implements ConfigDestroyRepositoryInterface
{
    protected $configDestroy;
    public function __construct(ConfigDestroy $configDestroy)
    {
        $this->configDestroy = $configDestroy;
    }

    public function get()
    {
        try {
            return $this->configDestroy->all();
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }
    }

    public function create($data)
    {
        try {
            $configDestroy = $this->configDestroy->create($data);
            if ($configDestroy) {
                return true;
            }
            return false;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi thao tác dữ liệu!', $e->getMessage(), $e->getCode());
        }
    }
}