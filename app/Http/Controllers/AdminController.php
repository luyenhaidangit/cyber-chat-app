<?php

namespace App\Http\Controllers;

use App\Constants\RoleConstants;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Guest\LoginRequest;
use App\Services\Interfaces\FileServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\Interfaces\RoleServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userService;
    protected $adminService;
    protected $roleService;
    protected $fileService;

    public function __construct(UserServiceInterface $userService, AdminServiceInterface $adminService, RoleServiceInterface $roleService, FileServiceInterface $fileService)
    {
        $this->userService = $userService;
        $this->adminService = $adminService;
        $this->roleService = $roleService;
        $this->fileService = $fileService;
    }
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function notFoundView()
    {
        return view('admin.404');
    }

    public function createUserView()
    {
        $roles = $this->roleService->getAll();
        return view('admin.user.create', compact('roles'));
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

    public function detailUserView($uuid)
    {
        $user = $this->userService->findOneByConditions([
            'uuid' => $uuid
        ]);

        if ($user) {
            return view('admin.user.detail', compact('user'));
        } else {
            return view('admin.404');
        }
    }

    public function deleteUserView($uuid)
    {
        $user = $this->userService->findOneByConditions([
            'uuid' => $uuid
        ]);

        if ($user) {
            return view('admin.user.delete', compact('user'));
        } else {
            return view('admin.404');
        }
    }

    public function deleteUser($uuid)
    {
        $result = $this->userService->delete($uuid);

        if ($result) {
            return redirect()->route('admin.user')->with('success', 'Xoá người dùng thành công!');
        } else {
            return back()->with('error', 'Không tìm thấy người dùng hợp lệ, xoá không thành công!');
        }
    }

    public function editUserView($uuid)
    {
        $roles = $this->roleService->getAll();

        $user = $this->userService->findOneByConditions([
            'uuid' => $uuid
        ]);

        if ($user) {
            return view('admin.user.edit', compact('user', 'roles'));
        } else {
            return view('admin.404');
        }
    }

    public function postCreateUser(CreateUserRequest $request)
    {
        if ($request->hasFile('avatarFile')) {
            $avatar = $request->file('avatarFile');
            $avatarFileName = $this->fileService->uploadImage($avatar, 'avatars');
            $request->merge(['avatar' => $avatarFileName]);
        }

        $data = $request->all();

        $result = $this->userService->create($data);

        if ($result) {
            return redirect()->route('admin.user')->with('success', 'Thêm người dùng thành công!');
        } else {
            return back()->with('error', 'Thêm người dùng thất bại!');
        }
    }

    public function postEditUser(EditUserRequest $request)
    {
        if ($request->hasFile('avatarFile')) {
            $avatar = $request->file('avatarFile');
            $avatarFileName = $this->fileService->uploadImage($avatar, 'avatars');
            $request->merge(['avatar' => $avatarFileName]);
        }

        $id = $request->input('id');
        $data = $request->all();

        $result = $this->userService->editUser($id, $data);

        if ($result) {
            return redirect()->route('admin.user')->with('success', 'Sửa người dùng thành công!');
        } else {
            return back()->with('error', 'Thêm người dùng thất bại!');
        }
    }
}