<?php

namespace App\Http\Controllers\api\v1;

use App\CPU\BrandManager;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function get_brands()
    {
        try {
            $brands = BrandManager::get_brands();
        } catch (\Exception $e) {
        }

        return response()->json($brands,200);
    }

    public function get_products($brand_id)
    {
        try {
            $products = BrandManager::get_products($brand_id);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($products,200);
    }
}
