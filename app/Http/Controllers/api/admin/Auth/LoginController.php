<?php

namespace App\Http\Controllers\api\admin\Auth;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function login(Request $request)
    {
        try {
            Helpers::custom_validator($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return $this->sendResponse(payload: auth()->user());
            }

            throw new \Exception('Credentials does not match.');

        } catch (\Throwable $ex) {
            return $this->sendError($ex->getMessage());
        }
    }


    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->sendResponse(message: 'Logout successfully');
    }
}
