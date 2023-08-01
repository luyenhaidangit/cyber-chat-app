<?php

namespace App\Http\Controllers;

use App\Constants\RoleConstants;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Guest\LoginRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Services\Interfaces\FileServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\Interfaces\RoleServiceInterface;
use App\Services\Interfaces\PermissionServiceInterface;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $userService;
    protected $adminService;
    protected $roleService;
    protected $fileService;
    protected $permissionService;

    public function __construct(UserServiceInterface $userService, AdminServiceInterface $adminService, RoleServiceInterface $roleService, FileServiceInterface $fileService, PermissionServiceInterface $permissionService)
    {
        $this->userService = $userService;
        $this->adminService = $adminService;
        $this->roleService = $roleService;
        $this->fileService = $fileService;
        $this->permissionService = $permissionService;
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

    public function createRoleView()
    {
        $permissions = $this->permissionService->getAll();
        return view('admin.role.create', compact('permissions'));
    }

    public function postCreateRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'required|string|max:500',
        ]);

        // Create a new role
        $role = new Role();
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        $permissions = $request->input('permissions', []);

        $allPermissions = [];

        foreach ($permissions as $permissionId) {
            $permission = Permission::find($permissionId);
            // dd($permission);
            if ($permission) {
                $role->permissions()->attach($permissionId);

                $parentPermission = $permission;
                while ($parentPermission->code_parent) {
                    $parentPermission = Permission::where('id', $parentPermission->code_parent)->first();
                    if ($parentPermission) {
                        if (!in_array($parentPermission->id, $allPermissions)) {
                            $role->permissions()->attach($parentPermission->id);
                            $allPermissions[] = $parentPermission->id;
                        }
                    } else {
                        break;
                    }
                }
            }
        }

        return redirect()->route('admin.role')->with('success', 'Thêm vai trò người dùng thành công!');
    }

    public function listRoleView(Request $request)
    {
        $roles = $this->roleService->getAll();

        return view('admin.role.index', compact('roles'));
    }

    public function detailRoleView($uuid)
    {
        $role = $this->roleService->findOneByConditions([
            'uuid' => $uuid
        ]);

        $permissions = $this->permissionService->getAll();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        if ($role) {
            return view('admin.role.detail', compact('role', 'permissions', 'rolePermissions'));
        } else {
            return view('admin.404');
        }
    }

    public function deleteRoleView($uuid)
    {
        $role = $this->roleService->findOneByConditions([
            'uuid' => $uuid
        ]);

        if ($role) {
            return view('admin.role.delete', compact('role'));
        } else {
            return view('admin.404');
        }
    }

    public function editRoleView($uuid)
    {
        $role = $this->roleService->findOneByConditions([
            'uuid' => $uuid
        ]);

        $permissions = $this->permissionService->getAll();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        if ($role) {
            return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions'));
        } else {
            return view('admin.404');
        }
    }

    public function postEditRole(Request $request)
    {
        $id = $request->input('id');

        $role = Role::find($id);
        if (!$role) {
            return redirect()->route('admin.role')->with('error', 'Vai trò không tồn tại!');
        }

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        $role->permissions()->detach();

        $permissions = $request->input('permissions', []);
        $allPermissions = [];

        foreach ($permissions as $permissionId) {
            $permission = Permission::find($permissionId);
            // dd($permission);
            if ($permission) {
                $role->permissions()->attach($permissionId);

                $parentPermission = $permission;
                while ($parentPermission->code_parent) {
                    $parentPermission = Permission::where('id', $parentPermission->code_parent)->first();
                    if ($parentPermission) {
                        if (!in_array($parentPermission->id, $allPermissions)) {
                            $role->permissions()->attach($parentPermission->id);
                            $allPermissions[] = $parentPermission->id;
                        }
                    } else {
                        break;
                    }
                }
            }
        }

        return redirect()->route('admin.role')->with('success', 'Cập nhật vai trò người dùng thành công!');
    }

    public function deleteRole($uuid)
    {
        $role = Role::where('uuid', $uuid)->first();

        if (!$role) {
            return response()->json(['message' => 'Không tìm thấy vai trò'], 404);
        }

        $role->delete();

        return redirect()->route('admin.role')->with('success', 'Xoá vai trò thành công!');
    }
}