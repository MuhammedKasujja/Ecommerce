<?php

namespace App\Services;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class EmployeeService implements IBaseService
{

    public function paginate(): LengthAwarePaginator
    {
        $employees = Admin::with(['role'])->whereNotIn('id', [1])->paginate(Helpers::pagination_limit());
        return $employees;
    }

    public function save(Request $request): Model
    {
        $admin = new Admin;
        $admin->name  = $request->name;
        $admin->phone =  $request->phone;
        $admin->email =  $request->email;
        $admin->admin_role_id =  $request->role_id;
        $admin->password =  bcrypt($request->password);
        $admin->image =  ImageManager::upload('admin/', 'png', $request->file('image'));
        $admin->created_at =  now();
        $admin->updated_at =  now();
        if (!$admin->save()) {
            throw new \Exception('Could not save employee details');
        }

        return $admin;
    }

    public function update(Request $request): Model
    {

        $admin = Admin::find($request->id);

        if (!$admin) {
            throw new \Exception('Employee details not found');
        }
        if ($request->has('image')) {
            $admin->image = ImageManager::update('admin/', $admin->image, 'png', $request->file('image'));
        }

        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->admin_role_id = $request->role_id;
        $admin->updated_at = now();

        if (!$admin->update()) {
            throw new \Exception('Could not update employee details');
        }

        return $admin;
    }


    public function delete($id): bool
    {
        $admin = Admin::find($id);

        if (!$admin) {
            throw new \Exception('Employee details not found');
        }

        if(!$admin->delete()){
            throw new \Exception('Could not archive employee');
        }
        return true;
    }
}
