<?php

namespace App\Http\Controllers;

use App\Constants\RoleConstants;
use App\Http\Requests\Guest\LoginRequest;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\Interfaces\ConfigDestroyServiceInterface;
use App\Models\ConfigDestroy;
use Illuminate\Http\Request;

class ConfigDestroyController extends Controller
{
    protected $configDestroyService;
    public function __construct(ConfigDestroyServiceInterface $configDestroyService)
    {
        $this->configDestroyService = $configDestroyService;
    }
    public function index()
    {
        $destroyConfigs = $this->configDestroyService->get();
        return view('admin.config-destroy.index', compact('destroyConfigs'));
    }

    public function create()
    {
        $configs = ConfigDestroy::all();
        return view('admin.config-destroy.create', compact('configs'));
    }

    public function saveConfigs(Request $request)
    {
        if ($request->isJson()) {
            $data = $request->json()->all();

            foreach ($data as $configData) {
                $configId = $configData['id'] ?? null; // Lấy id của config nếu có, nếu không thì gán giá trị null

                if ($configId) {
                    // Thực hiện cập nhật nếu có id
                    $config = ConfigDestroy::find($configId);
                    if (!$config) {
                        return response()->json(['error' => 'Không tìm thấy cấu hình'], 404);
                    }

                    $config->update([
                        'service' => $configData['service'],
                        'service_status' => $configData['service_status'],
                        'status' => $configData['status'],
                    ]);
                } else {
                    // Thực hiện tạo mới nếu không có id
                    $config = ConfigDestroy::create([
                        'service' => $configData['service'],
                        'service_status' => $configData['service_status'],
                        'status' => $configData['status'],
                    ]);
                }

                // Xử lý config_destroy_details
                $config->configDestroyDetails()->delete(); // Xóa hết config_destroy_details cũ
                foreach ($configData['config_destroy_details'] as $detailData) {
                    $config->configDestroyDetails()->create([
                        'from' => $detailData['from'],
                        'to' => $detailData['to'],
                        'date_type' => $detailData['date_type'],
                        'penalty_type' => $detailData['penalty_type'],
                        'penalty_money' => $detailData['penalty_money'],
                        'penalty_rate' => $detailData['penalty_rate'],
                        'minimum_money' => $detailData['minimum_money'],
                    ]);
                }
            }

            return response()->json(['message' => 'Thành công!'], 200);
        }

        return response()->json(['error' => 'Thất bại!'], 400);
    }
}