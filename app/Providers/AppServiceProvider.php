<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
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