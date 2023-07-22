<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Facades\UserFacade;

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
        // $this->app->bind('UserFacade', function () {
        //     return new UserFacade();
        // });
        // $this->app->bind('UserService', function () {
        //     return new UserService();
        // });
        // $this->app->bind('UserFacade', function () {
        //     return new UserFacade();
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}