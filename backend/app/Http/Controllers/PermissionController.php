<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function create()
    {
        return view('admins.permission.add');
    }

    public function store(Request $request)
    {
        $permission = $this->permission->create([
            'name'=>$request->module_parent,
            'display_name'=>$request->module_parent,
            'parent_id' => 0,
            'key_code' => ''
        ]);
        foreach ($request->module_child as $value) {
            $this->permission->create([
                'name' => $value,
                'display_name'=>$value,
                'parent_id'=> $permission->id,
                'key_code'=>$value.'_'.$request->module_parent
            ]);
        }

    }
}
