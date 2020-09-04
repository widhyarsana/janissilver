<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
       $orders = Order::where('customer_id', auth()->user()->id)->get();

       return view('customer.order.index', compact('orders'));
    }


    public function show(Order $order){
       
        return view('customer.order.show', compact('order'));
    }
}
