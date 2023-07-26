<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Models\User;

interface AdminRepositoryInterface
{
    public function get($pageIndex, $pageSize, $conditions);
}