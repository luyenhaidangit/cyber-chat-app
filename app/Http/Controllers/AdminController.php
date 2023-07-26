<?php

namespace App\Http\Controllers;

use App\Constants\RoleConstants;
use App\Http\Requests\Guest\LoginRequest;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\Interfaces\RoleServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userService;
    protected $adminService;
    protected $roleService;

    public function __construct(UserServiceInterface $userService, AdminServiceInterface $adminService, RoleServiceInterface $roleService)
    {
        $this->userService = $userService;
        $this->adminService = $adminService;
        $this->roleService = $roleService;
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

    public function postLogout()
    {
        $this->userService->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function listUserView(Request $request)
    {
        $pageIndex = $request->input('pageIndex', 1);
        $pageSize = $request->input('pageSize', 20);

        $conditions = [
            'username' => $request->input('username', null),
            'email' => $request->input('email', null),
            'status' => $request->has('status') ? intval($request->input('status')) : null,
            'roles' => $request->has('roles') ? array_map('intval', explode(',', $request->input('roles'))) : [],
            'startDate' => $request->input('startDate', null),
            'endDate' => $request->input('endDate', null),
        ];
        $roles = $this->roleService->getAll();
        $data = $this->adminService->get($pageIndex, $pageSize, $conditions);

        return view('admin.user.index', [
            'roles' => $roles,
            'users' => $data['data'],
            'totalRecords' => $data['total_records'],
            'pageIndex' => $data['page_index'],
            'pageSize' => $data['page_size']
        ]);
    }
}