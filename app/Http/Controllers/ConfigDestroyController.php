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

    public function createFriendShip()
    {

    }
}