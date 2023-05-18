<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomRoleController extends Controller
{
    public function create()
    {
        $rl = AdminRole::whereNotIn('id', [1])->get();
        return $this->sendResponse(payload: compact('rl'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:admin_roles',
        ], [
            'name.required' => 'Role name is required!'
        ]);

        DB::table('admin_roles')->insert([
            'name' => $request->name,
            'module_access' => json_encode($request['modules']),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return $this->sendResponse(message:'Role added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Role name is required!'
        ]);

        DB::table('admin_roles')->where(['id' => $id])->update([
            'name' => $request->name,
            'module_access' => json_encode($request['modules']),
            'status' => 1,
            'updated_at' => now()
        ]);

        return $this->sendResponse(message:'Role updated successfully!');
    }
}
