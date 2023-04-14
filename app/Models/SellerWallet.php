<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerWallet extends Model
{
    protected $casts = [
        'balance' => 'float',
        'withdrawn' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
