<?php

namespace App\Http\Controllers;

use App\CPU\CartManager;
use App\CPU\OrderManager;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorPayController extends Controller
{
    public function payWithRazorpay()
    {
        return view('razor-pay');
    }

    public function payment(Request $request)
    {
        try {
            $api = new Api(config('razor.razor_key'), config('razor.razor_secret'));
            $payment = $api->payment->fetch($request['razorpay_payment_id']);

            if (count($request->all()) && !empty($request['razorpay_payment_id'])) {
                $response = $api->payment->fetch($request['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $unique_id = OrderManager::gen_unique_id();
                $order_ids = [];
                foreach (CartManager::get_cart_group_ids() as $group_id) {
                    $data = [
                        'payment_method' => 'razor_pay',
                        'order_status' => 'confirmed',
                        'payment_status' => 'paid',
                        'transaction_ref' => $request['razorpay_payment_id'],
                        'order_group_id' => $unique_id,
                        'cart_group_id' => $group_id
                    ];
                    $order_id = OrderManager::generate_order($data);
                    array_push($order_ids, $order_id);
                }
            }
            CartManager::cart_clean();

        } catch (\Exception $exception) {
            Toastr::error('Payment process failed');
            return back();
        }

        if (session()->has('payment_mode') && session('payment_mode') == 'app') {
            return redirect()->route('payment-success');
        }

        return view('web-views.checkout-complete');
    }

    public function success()
    {
        if (auth('customer')->check()) {
            Toastr::success('Payment success.');
            return redirect('/account-oder');
        }
        return response()->json(['message' => 'Payment succeeded'], 200);
    }

    public function fail()
    {
        if (auth('customer')->check()) {
            Toastr::error('Payment failed.');
            return redirect('/account-oder');
        }
        return response()->json(['message' => 'Payment failed'], 403);
    }
}
