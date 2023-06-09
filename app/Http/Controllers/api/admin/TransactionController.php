<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\OrderTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function list(Request $request)
    {

        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $transactions = OrderTransaction::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('order_id', 'like', "%{$value}%")
                        ->orWhere('transaction_id', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $transactions = new OrderTransaction();
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
        return $this->sendResponse(payload: $transactions);
    }
}
