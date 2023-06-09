<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $casts = [
        'price' => 'float',
        'discount' => 'float',
        'tax' => 'float',
    ];

    public function cart_shipping(){
        return $this->hasOne(CartShipping::class,'cart_group_id','cart_group_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->where('status', 1);
    }
}
