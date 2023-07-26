<?php

namespace App\Http\Controllers;

use App\Constants\RoleConstants;
use App\Http\Requests\Guest\LoginRequest;
use App\Services\Interfaces\UserServiceInterface;

class AdminController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        $result = $this->userService->login($credentials, $remember, RoleConstants::ROLE_ADMIN);

        if ($result) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Tên tài khoản hoặc mật khẩu không chính xác!');
        }
    }
}