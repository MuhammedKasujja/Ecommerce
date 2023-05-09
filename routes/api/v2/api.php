<?php

use App\Http\Controllers\api\v2\LsLibController;
use App\Http\Controllers\api\v2\seller\auth\LoginController;
use App\Http\Controllers\api\v2\seller\ChatController;
use App\Http\Controllers\api\v2\seller\OrderController;
use App\Http\Controllers\api\v2\seller\ProductController;
use App\Http\Controllers\api\v2\seller\SellerController;
use App\Http\Controllers\api\v2\seller\ShippingMethodController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'api\v2', 'prefix' => 'v2', 'middleware' => ['api_lang']], function () {
    Route::group(['prefix' => 'seller', 'namespace' => 'seller'], function () {

        Route::get('seller-info', [SellerController::class, 'seller_info']);
        Route::get('shop-product-reviews', [SellerController::class, 'shop_product_reviews']);
        Route::put('seller-update', [SellerController::class, 'seller_info_update']);
        Route::get('monthly-earning', [SellerController::class, 'monthly_earning']);
        Route::get('monthly-commission-given', [SellerController::class, 'monthly_commission_given']);

        Route::get('shop-info', [SellerController::class, 'shop_info']);
        Route::get('transactions', [SellerController::class, 'transaction']);
        Route::put('shop-update', [SellerController::class, 'shop_info_update']);

        Route::post('balance-withdraw', [SellerController::class, 'withdraw_request']);
        Route::delete('close-withdraw-request', [SellerController::class, 'close_withdraw_request']);

        Route::group(['prefix' => 'products'], function () {
            Route::post('upload-images', [ProductController::class, 'upload_images']);
            Route::post('add', [ProductController::class, 'add_new']);
            Route::get('list', [ProductController::class, 'list']);
            Route::get('edit/{id}', [ProductController::class, 'edit']);
            Route::put('update/{id}', [ProductController::class, 'update']);
            Route::delete('delete/{id}', [ProductController::class, 'delete']);
        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('list', [OrderController::class, 'list']);
            Route::get('/{id}', [OrderController::class, 'details']);
            Route::put('order-detail-status/{id}', [OrderController::class, 'order_detail_status']);
        });

        Route::group(['prefix' => 'shipping-method'], function () {
            Route::get('list', [ShippingMethodController::class, 'list']);
            Route::post('add', [ShippingMethodController::class, 'store']);
            Route::get('edit/{id}', [ShippingMethodController::class, 'edit']);
            Route::put('status', [ShippingMethodController::class, 'status_update']);
            Route::put('update/{id}', [ShippingMethodController::class, 'update']);
            Route::delete('delete/{id}', [ShippingMethodController::class, 'delete']);
        });

        Route::group(['prefix' => 'messages'], function () {
            Route::get('list', [ChatController::class, 'messages']);
            Route::post('send', [ChatController::class, 'send_message']);
        });

        Route::group(['prefix' => 'auth', 'namespace' => 'auth'], function () {
            Route::post('login', [LoginController::class,'login']);
        });
    });
    Route::post('ls-lib-update', [LsLibController::class,'lib_update']);
});
