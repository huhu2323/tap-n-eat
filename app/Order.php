<?php

namespace App;

use App\Member;
use App\OrderItem;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function member()
    {
    	return $this->belongsTo(Member::class);
    }

    public function orderItems()
    {
    	return $this->hasMany(OrderItem::class);
    }

}
