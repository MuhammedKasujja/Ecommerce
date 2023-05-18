<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\WithdrawRequest;
use App\Models\SellerWallet;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Review;
use App\Models\OrderTransaction;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $sellers = Seller::with(['orders', 'product'])
                ->where(function ($q) use ($key) {
                    foreach ($key as $value) {
                        $q->orWhere('f_name', 'like', "%{$value}%")
                            ->orWhere('l_name', 'like', "%{$value}%")
                            ->orWhere('phone', 'like', "%{$value}%")
                            ->orWhere('email', 'like', "%{$value}%");
                    }
                });
            $query_param = ['search' => $request['search']];
        } else {
            $sellers = Seller::with(['orders', 'product']);
        }
        $sellers = $sellers->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return $this->sendResponse(payload: $sellers);
    }

    public function view(Request $request, $id, $tab = null)
    {
        $seller = Seller::findOrFail($id);
        if ($tab == 'order') {
            $id = $seller->id;
            $orders = Order::where(['seller_is' => 'seller'])->where(['seller_id' => $id])->latest()->paginate(Helpers::pagination_limit());
            // $orders->map(function ($data) {
            //     $value = 0;
            //     foreach ($data->details as $detail) {
            //         $value += ($detail['price'] * $detail['qty']) + $detail['tax'] - $detail['discount'];
            //     }
            //     $data['total_sum'] = $value;
            //     return $data;
            // });
            return $this->sendResponse(payload: compact('seller', 'orders'));
        } else if ($tab == 'product') {
            $products = Product::where('added_by', 'seller')->where('user_id', $seller->id)->paginate(Helpers::pagination_limit());
            return $this->sendResponse(payload: compact('seller', 'products'));
        } else if ($tab == 'setting') {
            $commission = $request['commission'];
            if ($request->has('commission')) {
                request()->validate([
                    'commission' => 'required | numeric | min:1',
                ]);

                if ($request['commission_status'] == 1 && $request['commission'] == null) {
                    Toastr::error('You did not set commission percentage field.');
                    //return back();
                } else {
                    $seller = Seller::find($id);
                    $seller->sales_commission_percentage = $request['commission_status'] == 1 ? $request['commission'] : null;
                    $seller->save();

                    return $this->sendResponse(message: 'Commission percentage for this seller has been updated.');
                }
            }
            $commission = 0;
            if ($request->has('gst')) {
                if ($request['gst_status'] == 1 && $request['gst'] == null) {
                    Toastr::error('You did not set GST number field.');
                    //return back();
                } else {
                    $seller = Seller::find($id);
                    $seller->gst = $request['gst_status'] == 1 ? $request['gst'] : null;
                    $seller->save();

                    return $this->sendResponse(message: 'GST number for this seller has been updated.');
                }
            }

            return $this->sendResponse(payload: $seller);
        } else if ($tab == 'transaction') {
            $transactions = OrderTransaction::where('seller_is', 'seller')->where('seller_id', $seller->id);

            $query_param = [];
            $search = $request['search'];
            if ($request->has('search')) {
                $key = explode(' ', $request['search']);
                $transactions = $transactions->where(function ($q) use ($key) {
                    foreach ($key as $value) {
                        $q->Where('order_id', 'like', "%{$value}%")
                            ->orWhere('transaction_id', 'like', "%{$value}%");
                    }
                });
                $query_param = ['search' => $request['search']];
            } else {
                $transactions = $transactions;
            }
            $status = $request['status'];
            if ($request->has('status')) {
                $key = explode(' ', $request['status']);
                $transactions = $transactions->where(function ($q) use ($key) {
                    foreach ($key as $value) {
                        $q->Where('status', 'like', "%{$value}%");
                    }
                });
                $query_param = ['status' => $request['status']];
            }
            $transactions = $transactions->latest()->paginate(Helpers::pagination_limit())->appends($query_param);

            return $this->sendResponse(payload: compact('seller', 'transactions', 'search', 'status'));
        } else if ($tab == 'review') {
            $sellerId = $seller->id;

            $query_param = [];
            $search = $request['search'];
            if ($request->has('search')) {
                $key = explode(' ', $request['search']);
                $product_id = Product::where('added_by', 'seller')->where('user_id', $sellerId)->where(function ($q) use ($key) {
                    foreach ($key as $value) {
                        $q->where('name', 'like', "%{$value}%");
                    }
                })->pluck('id')->toArray();

                $reviews = Review::with(['product'])
                    ->whereIn('product_id', $product_id);

                $query_param = ['search' => $request['search']];
            } else {
                $reviews = Review::with(['product'])->whereHas('product', function ($query) use ($sellerId) {
                    $query->where('user_id', $sellerId)->where('added_by', 'seller');
                });
            }
            //dd($reviews->count());
            $reviews = $reviews->paginate(Helpers::pagination_limit())->appends($query_param);

            return $this->sendResponse(payload: compact('seller', 'reviews', 'search'));
        }
        return $this->sendResponse(payload: $seller);
    }

    public function updateStatus(Request $request)
    {
        $order = Seller::findOrFail($request->id);
        $order->status = $request->status;
        if ($request->status == "approved") {
            return $this->sendResponse(message: 'Seller has been approved successfully');
        } else if ($request->status == "rejected") {
            return $this->sendResponse(message: 'Seller has been rejected successfully');
        } else if ($request->status == "suspended") {
            $order->auth_token = Str::random(80);
            return $this->sendResponse(message: 'Seller has been suspended successfully');
        }
        $order->save();
        return $this->sendResponse(message: 'Order updated');
    }

    public function order_list($seller_id)
    {
        $orders = Order::where('seller_id', $seller_id)->where('seller_is', 'seller');

        $orders = $orders->latest()->paginate(Helpers::pagination_limit());
        $seller = Seller::findOrFail($seller_id);
        return $this->sendResponse(payload: compact('orders', 'seller'));
    }

    public function product_list($seller_id)
    {
        $product = Product::where(['user_id' => $seller_id, 'added_by' => 'seller'])->latest()->paginate(Helpers::pagination_limit());
        $seller = Seller::findOrFail($seller_id);
        return $this->sendResponse(payload: compact('product', 'seller'));
    }

    public function order_details($order_id, $seller_id)
    {
        $order = Order::with('shipping')->where(['id' => $order_id])->first();
        return $this->sendResponse(payload: compact('order', 'seller_id'));
    }

    public function withdraw()
    {
        $all = session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'all' ? 1 : 0;
        $active = session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'approved' ? 1 : 0;
        $denied = session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'denied' ? 1 : 0;
        $pending = session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'pending' ? 1 : 0;

        $withdraw_req = WithdrawRequest::with(['seller'])
            ->when($all, function ($query) {
                return $query;
            })
            ->when($active, function ($query) {
                return $query->where('approved', 1);
            })
            ->when($denied, function ($query) {
                return $query->where('approved', 2);
            })
            ->when($pending, function ($query) {
                return $query->where('approved', 0);
            })
            ->orderBy('id', 'desc')
            ->latest()
            ->paginate(Helpers::pagination_limit());

        return $this->sendResponse(payload: $withdraw_req);
    }

    public function withdraw_view($withdraw_id, $seller_id)
    {
        $seller = WithdrawRequest::with(['seller'])->where(['id' => $withdraw_id])->first();
        return $this->sendResponse(payload: $seller);
    }

    public function withdrawStatus(Request $request, $id)
    {
        $withdraw = WithdrawRequest::find($id);
        $withdraw->approved = $request->approved;
        $withdraw->transaction_note = $request['note'];
        if ($request->approved == 1) {
            SellerWallet::where('seller_id', $withdraw->seller_id)->increment('withdrawn', $withdraw['amount']);
            SellerWallet::where('seller_id', $withdraw->seller_id)->decrement('pending_withdraw', $withdraw['amount']);
            $withdraw->save();
            return $this->sendResponse(message: 'Seller Payment has been approved successfully');
        }

        SellerWallet::where('seller_id', $withdraw->seller_id)->increment('total_earning', $withdraw['amount']);
        SellerWallet::where('seller_id', $withdraw->seller_id)->decrement('pending_withdraw', $withdraw['amount']);
        $withdraw->save();
        return $this->sendResponse(message: 'Seller Payment request has been Denied successfully');
    }

    public function sales_commission_update(Request $request, $id)
    {
        if ($request['status'] == 1 && $request['commission'] == null) {
            return $this->sendError('You did not set commission percentage field.');
        }

        $seller = Seller::find($id);
        $seller->sales_commission_percentage = $request['status'] == 1 ? $request['commission'] : null;
        $seller->save();

        return $this->sendResponse(message: 'Commission percentage for this seller has been updated.');
    }
}
