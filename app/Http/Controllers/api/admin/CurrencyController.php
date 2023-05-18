<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\Currency;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $currencies = Currency::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('name', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $currencies = new Currency();
        }
        $currencies = $currencies->paginate(Helpers::pagination_limit())->appends($query_param);
        return $this->sendResponse(payload: compact('currencies', 'search'));
    }

    public function store(Request $request)
    {
        $currency = new Currency;
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->exchange_rate = $request->has('exchange_rate') ? $request->exchange_rate : 1;
        $currency->save();
        return $this->sendResponse(message: 'New Currency inserted successfully!');
    }

    public function edit($id)
    {
        $data = Currency::find($id);
        return view('admin-views.currency.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $currency = Currency::find($id);
            if ($currency['code'] == 'BDT' && $request->code != 'BDT') {
                $config = Helpers::get_business_settings('ssl_commerz_payment');
                if ($config['status']) {
                    throw new \Exception('Before update BDT, disable the SSLCOMMERZ payment gateway.');
                }
            } elseif ($currency['code'] == 'INR' && $request->code != 'INR') {
                $config = Helpers::get_business_settings('razor_pay');
                if ($config['status']) {
                    throw new \Exception('Before update INR, disable the RAZOR PAY payment gateway.');
                }
            } elseif ($currency['code'] == 'MYR' && $request->code != 'MYR') {
                $config = Helpers::get_business_settings('senang_pay');
                if ($config['status']) {
                    throw new \Exception('Before update MYR, disable the SENANG PAY payment gateway.');
                }
            } elseif ($currency['code'] == 'ZAR' && $request->code != 'ZAR') {
                $config = Helpers::get_business_settings('paystack');
                if ($config['status']) {
                    throw new \Exception('Before update ZAR, disable the PAYSTACK payment gateway.');
                }
            }
            $currency->name = $request->name;
            $currency->symbol = $request->symbol;
            $currency->code = $request->code;
            $currency->exchange_rate = $request->has('exchange_rate') ? $request->exchange_rate : 1;
            $currency->save();
            return $this->sendResponse(message: 'Currency updated successfully!');

        } catch (\Exception $ex) {
            return $this->sendResponse($ex->getMessage());
        }
    }

    public function delete($id)
    {
        if (!in_array($id, [1, 2, 3, 4, 5])) {
            Currency::where('id', $id)->delete();
            return $this->sendResponse(message: 'Currency removed successfully!');
        } else {
            return $this->sendError('This Currency cannot be removed due to payment gateway dependency!');
        }
    }

    public function status(Request $request)
    {
        if ($request->status == 0) {
            $count = Currency::where(['status' => 1])->count();
            if ($count == 1) {
                return $this->sendError('You can not disable all currencies.');
            }
        }
        $currency = Currency::find($request->id);
        $currency->status = $request->status;
        $currency->save();
        return $this->sendResponse(
            message: 'Currency status successfully changed.'
        );
    }

    public function systemCurrencyUpdate(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'system_default_currency')->first();
        $business_settings->value = $request['currency_id'];
        $business_settings->save();

        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $default = Currency::find($request['currency_id']);
            foreach (Currency::all() as $data) {
                Currency::where(['id' => $data['id']])->update([
                    'exchange_rate' => ($data['exchange_rate'] / $default['exchange_rate']),
                    'updated_at' => now()
                ]);
            }
        }

        return $this->sendResponse(message: 'System Default currency updated successfully!');
    }
}
