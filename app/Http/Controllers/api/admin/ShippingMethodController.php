<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\BackEndHelper;
use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingMethodController extends Controller
{
    public function index_admin()
    {
        $shipping_methods = ShippingMethod::where(['creator_type' => 'admin'])->get();
        return $this->sendResponse(payload: $shipping_methods);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|max:200',
            'duration' => 'required',
            'cost'     => 'numeric',
        ]);

        DB::table('shipping_methods')->insert([
            'creator_id'   => auth('admin')->id(),
            'creator_type' => 'admin',
            'title'        => $request['title'],
            'duration'     => $request['duration'],
            'cost'         => BackEndHelper::currency_to_usd($request['cost']),
            'status'       => 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return $this->sendResponse(message: 'Successfully added.');
    }

    public function status_update(Request $request)
    {
        ShippingMethod::where(['id' => $request['id']])->update([
            'status' => $request['status'],
        ]);
        return $this->sendResponse(payload: ['status' => 1]);
    }

    public function edit($id)
    {
        if ($id != 1) {
            $method = ShippingMethod::where(['id' => $id])->first();
            return $this->sendResponse(payload:  $method);
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|max:200',
            'duration' => 'required',
            'cost'     => 'numeric',
        ]);

        DB::table('shipping_methods')->where(['id' => $id])->update([
            'creator_id'   => auth('admin')->id(),
            'creator_type' => 'admin',
            'title'        => $request['title'],
            'duration'     => $request['duration'],
            'cost'         => BackEndHelper::currency_to_usd($request['cost']),
            'status'       => 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return $this->sendResponse(message: 'Successfully updated.');
    }

    public function setting()
    {
        return view('admin-views.shipping-method.setting');
    }
    public function shippingStore(Request $request)
    {
        DB::table('business_settings')->updateOrInsert(['type' => 'shipping_method'], [
            'value' => $request['shippingMethod']
        ]);
        return $this->sendResponse(message: 'Shipping Method Added Successfully!');
    }

    public function delete(Request $request)
    {

        $shipping = ShippingMethod::find($request->id);

        $shipping->delete();
        return $this->sendResponse(message: 'Shipping Method deleted Successfully!');
    }
}
