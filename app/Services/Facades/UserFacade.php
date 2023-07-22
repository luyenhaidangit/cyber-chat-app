<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\Interfaces\UserServiceInterface::class;
    }
}