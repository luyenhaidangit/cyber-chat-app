<?php

namespace App\Providers;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\PermissionRepository;
use App\Services\Interfaces\PermissionServiceInterface;
use App\Services\PermissionService;
use App\Services\UserService;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\AdminService;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\AdminRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Services\Interfaces\RoleServiceInterface;
use App\Services\RoleService;
use App\Services\Interfaces\ConfigDestroyServiceInterface;
use App\Services\ConfigDestroyService;
use App\Repositories\ConfigDestroyRepository;
use App\Repositories\Interfaces\ConfigDestroyRepositoryInterface;
use App\Services\Interfaces\FileServiceInterface;
use App\Services\FileService;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\AuthService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(ConfigDestroyRepositoryInterface::class, ConfigDestroyRepository::class);
        $this->app->bind(ConfigDestroyServiceInterface::class, ConfigDestroyService::class);
        $this->app->bind(FileServiceInterface::class, FileService::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('api', function ($data = null, $status = null, $code = null, $message = null, $customFields = []) {
            $response = [
                'data' => $data,
                'status' => $status,
                'code' => $code,
                'message' => $message,
            ];

            if (!empty($customFields) && is_array($customFields)) {
                $response = array_merge($response, $customFields);
            }

            return response()->json($response, $code);
        });
    }
}