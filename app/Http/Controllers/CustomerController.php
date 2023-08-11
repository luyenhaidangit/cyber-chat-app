<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AuthServiceInterface;

class CustomerController extends Controller
{
    protected $authService;
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function postLogout()
    {
        $this->authService->logout();
        return redirect()->route('logout');
    }
}