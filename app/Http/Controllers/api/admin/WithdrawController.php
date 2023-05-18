<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\SellerWallet;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function update(Request $request, $id)
    {
        $w = WithdrawRequest::find($id);
        if ($w->approved1 != 1) {
            SellerWallet::where('seller_id', $w->seller_id)->increment('withdrawn', $w->amount);
        }
        $w->approved = $request['approved'];
        $w->transaction_note = $request['note'];
        $w->save();
        return $this->sendResponse(message: 'Updated!');
    }

    public function status_filter(Request $request)
    {
        session()->put('withdraw_status_filter', $request['withdraw_status_filter']);
        return $this->sendResponse(payload: session('withdraw_status_filter'));
    }
}
