<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $fillable = [
        'orderuid','user_id','billing_id','subtotal','coupon','discount','vat','shipping','total','payment_status','status','deleted_at'
    ];


    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
