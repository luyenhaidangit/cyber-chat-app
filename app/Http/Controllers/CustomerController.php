<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\UserServiceInterface;

class CustomerController extends Controller
{
    protected $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function postLogout()
    {
        $this->userService->logout();
        if (session('lock_screen')) {
            session(['lock_screen' => false]);
        }
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('logout');
    }
}