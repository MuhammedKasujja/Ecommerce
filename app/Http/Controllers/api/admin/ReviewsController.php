<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ReviewsController extends Controller
{
    function list(Request $request)
    {
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $product_id = Product::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('name', 'like', "%{$value}%");
                }
            })->pluck('id')->toArray();

            $customer_id = User::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('f_name', 'like', "%{$value}%")
                        ->orWhere('l_name', 'like', "%{$value}%");
                }
            })->pluck('id')->toArray();

            $reviews = Review::WhereIn('product_id',  $product_id)->orWhereIn('customer_id', $customer_id);
        } else {
            $reviews = Review::with(['product', 'customer']);
        }
        $reviews = $reviews->paginate(Helpers::pagination_limit());
        return $this->sendResponse(payload: $reviews);
    }
}
