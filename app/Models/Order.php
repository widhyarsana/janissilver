<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
      return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('price', 'qty');
    }

    public function production(){
      return $this->hasOne(Production::class, 'order_id');
    }

    public function customer(){
      return $this->belongsTo(User::class, 'customer_id');
    }
}
