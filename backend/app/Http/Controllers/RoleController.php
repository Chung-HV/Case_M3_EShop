<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admins.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionParents = $this->permission->where('parent_id', 0)->get();
        return view('admins.role.add', compact('permissionParents'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name'=>$request->name,
            'display_name' =>$request->display_name
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $permissionParents = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('admins.role.edit', compact('permissionParents', 'role', 'permissionsChecked'));

    }

    public function update(Request $request, $id)
    {
        $role = $this->role->find($id)->update([
            'name'=>$request->name,
            'display_name' =>$request->display_name
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.index');

    }

    public function delete($id)
    {
        try {
            $this->role->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message' . $exception->getMessage() . 'line' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
