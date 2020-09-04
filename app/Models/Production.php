<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    public function order(){
      return $this->belongsTo(Order::class, 'order_id');
    }
}
