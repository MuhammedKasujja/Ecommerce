<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function add_new()
    {
        $rls = AdminRole::whereNotIn('id', [1])->get();
        return $this->sendResponse(payload: compact('rls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'image' => 'required',
            'email' => 'required|email|unique:users',

        ], [
            'name.required' => 'Role name is required!',
            'role_name.required' => 'Role id is Required',
            'email.required' => 'Email id is Required',
            'image.required' => 'Image is Required',

        ]);

        if ($request->role_id == 1) {
            return $this->sendError('Access Denied!');
        }

        DB::table('admins')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'admin_role_id' => $request->role_id,
            'password' => bcrypt($request->password),
            'image' => ImageManager::upload('admin/', 'png', $request->file('image')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->sendResponse(message: 'Employee added successfully!');
    }

    function list()
    {
        $employees = Admin::with(['role'])->whereNotIn('id', [1])->paginate(Helpers::pagination_limit());
        return $this->sendResponse(payload: $employees);
    }

    public function edit($id)
    {
        $e = Admin::where(['id' => $id])->first();
        $rls = AdminRole::whereNotIn('id', [1])->get();
        return $this->sendResponse(payload: compact('rls', 'e'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'role_id' => 'required',
            ], [
                'name.required' => 'Role name is required!',
            ]);

            if ($request->role_id == 1) {
                throw new \Exception('Access Denied!');
            }

            $e = Admin::find($id);
            if ($request['password'] == null) {
                $pass = $e['password'];
            } else {
                if (strlen($request['password']) < 7) {
                    throw new \Exception('Password length must be 8 character.');
                }
                $pass = bcrypt($request['password']);
            }

            if ($request->has('image')) {
                $e['image'] = ImageManager::update('admin/', $e['image'], 'png', $request->file('image'));
            }

            DB::table('admins')->where(['id' => $id])->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'admin_role_id' => $request->role_id,
                'password' => $pass,
                'image' => $e['image'],
                'updated_at' => now(),
            ]);

            return $this->sendResponse(message: 'Employee updated successfully!');
        } catch (\Throwable $ex) {
            $this->sendError($ex->getMessage());
        }
    }
}
