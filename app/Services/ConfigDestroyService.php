<?php

namespace App\Services;

use App\Services\Interfaces\ConfigDestroyServiceInterface;
use App\Repositories\Interfaces\ConfigDestroyRepositoryInterface;
use App\Exceptions\ApiException;

class ConfigDestroyService implements ConfigDestroyServiceInterface
{
    protected $configDestroyRepository;
    public function __construct(ConfigDestroyRepositoryInterface $configDestroyRepository)
    {
        $this->configDestroyRepository = $configDestroyRepository;
    }

    public function get()
    {
        try {
            $data = $this->configDestroyRepository->get();
            return $data;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), $e->getCode());
        }
    }

    public function create($data)
    {
        try {
            $result = $this->configDestroyRepository->create($data);
            return $result;
        } catch (ApiException $e) {
            throw new ApiException('Xuất hiện lỗi khi xử lý nghiệp vụ!', $e->getMessage(), $e->getCode());
        }
    }
}