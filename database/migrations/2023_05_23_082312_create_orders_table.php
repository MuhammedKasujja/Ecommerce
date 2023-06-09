<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id', 15)->nullable();
            $table->string('customer_type', 10)->nullable();
            $table->string('payment_status', 15)->default('unpaid');
            $table->string('order_status', 50)->default('pending');
            $table->string('payment_method', 100)->nullable();
            $table->string('transaction_ref', 30)->nullable();
            $table->double('order_amount')->default(0);
            $table->text('shipping_address')->nullable();
            $table->timestamps();
            $table->double('discount_amount')->default(0);
            $table->string('discount_type', 30)->nullable();
            $table->string('coupon_code')->nullable();
            $table->bigInteger('shipping_method_id')->default(0);
            $table->double('shipping_cost', 8, 2)->default(0);
            $table->string('order_group_id')->default('def-order-group');
            $table->string('verification_code')->default('0');
            $table->bigInteger('seller_id')->nullable();
            $table->string('seller_is')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
