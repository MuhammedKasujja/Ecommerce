<?php

namespace App\Http\Controllers\api\v1;

use App\CPU\Helpers;
use App\CPU\ProductManager;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function get_seller_info(Request $request)
    {
        $seller = Seller::with(['shop'])->where(['id' => $request['seller_id']])->first(['id', 'f_name', 'l_name', 'phone', 'image']);
        return response()->json($seller, 200);
    }

    public function get_seller_products($seller_id, Request $request)
    {
        $data = ProductManager::get_seller_products($seller_id, $request['limit'], $request['offset']);
        $data['products'] = Helpers::product_data_formatting($data['products'], true);
        return response()->json($data, 200);
    }

    public function get_top_sellers()
    {
        $top_sellers = Seller::where(['status' => 'approved'])->with('shop')
            ->withCount(['orders'])->orderBy('orders_count', 'DESC')->take(15)->get();
        $top_sellers = $top_sellers->map(function ($data) {
            $data = $data->shop;
            return $data;
        });
        return response()->json($top_sellers, 200);
    }

    public function get_all_sellers()
    {
        $top_sellers = Seller::where(['status' => 'approved'])->with('shop')
            ->withCount(['orders'])->orderBy('orders_count', 'DESC')->get();
        $top_sellers = $top_sellers->map(function ($data) {
            $data = $data->shop;
            return $data;
        });
        return response()->json($top_sellers, 200);
    }
}
