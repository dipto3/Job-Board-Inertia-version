<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    const moduleDirectory = 'admin.role.';

    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('index-role')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'roles' => $this->roleService->getAllRole(),
        ];

        return view(self::moduleDirectory.'index', $data);
    }

    public function create()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('create-role')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'permissions' => $this->roleService->allPermission(),
        ];

        return view(self::moduleDirectory.'create', $data);
    }

    public function store(RoleFormRequest $request)
    {
        $request->validated();
        $role = $this->roleService->storeRole($request);
        toastr()->addInfo('', 'Role Created Successfully.');

        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('edit-role')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'role' => $this->roleService->roleInfo($id),
            'permissions' => $this->roleService->allPermission(),
        ];

        return view(self::moduleDirectory.'edit', $data);
    }

    public function update($id, Request $request)
    {
        $role = $this->roleService->updateRole($id, $request);

        return redirect()->route('role.index');
        toastr()->addInfo('', 'Role Updates Successfully.');
    }

    public function destroy($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('delete-role')) {
            abort(403, 'Unauthorized Access!');
        }
        $role = $this->roleService->destroyRoleInfo($id);
        toastr()->addInfo('', 'Role Removed Successfully.');

        return redirect()->route('role.index');
    }

    public function details($id)
    {
        $data = [
            'roles' => $this->roleService->rolePermission($id),
        ];

        return view(self::moduleDirectory.'details', $data);
    }
}
