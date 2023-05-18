<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Convert;
use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function add_new(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $coupouns = Coupon::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('title', 'like', "%{$value}%")
                        ->orWhere('code', 'like', "%{$value}%")
                        ->orWhere('discount_type', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $coupouns = new Coupon();
        }

        $coupouns = $coupouns->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return $this->sendResponse(payload: compact('coupouns', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
            'discount' => 'required',
            'min_purchase' => 'required',
            'limit' => 'required',
        ]);

        DB::table('coupons')->insert([
            'coupon_type' => $request->coupon_type,
            'title' => $request->title,
            'code' => $request->code,
            'start_date' => $request->start_date,
            'expire_date' => $request->expire_date,
            'min_purchase' => Convert::usd($request->min_purchase),
            'max_discount' => Convert::usd($request->max_discount),
            'discount' => $request->discount_type == 'amount' ? Convert::usd($request->discount) : $request['discount'],
            'discount_type' => $request->discount_type,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'limit' => $request->limit,
        ]);

        return $this->sendResponse(message: 'Coupon added successfully!');
    }

    public function edit($id)
    {
        $c = Coupon::where(['id' => $id])->first();
        return view('admin-views.coupon.edit', compact('c'));
    }

    public function update(Request $request, $id)
    {
        try {
            Helpers::custom_validator(
                $request->all(),
                [
                    'code' => 'required',
                    'title' => 'required',
                    'start_date' => 'required',
                    'expire_date' => 'required',
                    'discount' => 'required',
                    'min_purchase' => 'required',
                    'limit' => 'required',
                ]
            );

            DB::table('coupons')->where(['id' => $id])->update([
                'coupon_type' => $request->coupon_type,
                'title' => $request->title,
                'code' => $request->code,
                'start_date' => $request->start_date,
                'expire_date' => $request->expire_date,
                'min_purchase' => Convert::usd($request->min_purchase),
                'max_discount' => Convert::usd($request->max_discount),
                'discount' => $request->discount_type == 'amount' ? Convert::usd($request->discount) : $request['discount'],
                'discount_type' => $request->discount_type,
                'updated_at' => now(),
                'limit' => $request->limit,
            ]);

            return $this->sendResponse(message: 'Coupon updated successfully!');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function status(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->status = $request->status;
        $coupon->save();
        // $data = $request->status;
        // return response()->json($data);
        return $this->sendResponse(message: 'Coupon status updated!');
    }
}
