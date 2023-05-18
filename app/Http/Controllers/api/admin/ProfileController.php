<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function view()
    {
        $data = Admin::where('id', auth('admin')->id())->first();
        return $this->sendResponse(payload: $data);
    }

    public function edit($id)
    {
        $data = Admin::where('id', $id)->first();
        return $this->sendResponse(payload: $data);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        if ($request->image) {
            $admin->image = ImageManager::update('admin/', $admin->image, 'png', $request->file('image'));
        }
        $admin->save();
        return $this->sendResponse(message: 'Profile updated successfully!');
    }

    public function settings_password_update(Request $request)
    {
        $request->validate([
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        $admin = Admin::find(auth('admin')->id());
        $admin->password = bcrypt($request['password']);
        $admin->save();
        return $this->sendResponse(message: 'Admin password updated successfully!');
    }
}
