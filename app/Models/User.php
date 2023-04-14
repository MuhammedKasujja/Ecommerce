<?php

namespace App\Models;

use App\Models\Order;
use App\Models\ShippingAddress;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   protected $fillable = [
       'f_name', 'l_name', 'name', 'email', 'password', 'phone', 'image', 'login_medium','is_active','social_id','is_phone_verified','temporary_token'
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'password', 'remember_token',
   ];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = [
       'email_verified_at' => 'datetime',
   ];

   public function wish_list()
   {
       return $this->hasMany(Wishlist::class, 'customer_id');
   }

   public function orders()
   {
       return $this->hasMany(Order::class, 'customer_id');
   }

   public function customer()
   {
       return $this->belongsTo(User::class, 'customer_id');
   }

   public function shipping()
   {
       return $this->belongsTo(ShippingAddress::class, 'shipping_address');
   }

}
