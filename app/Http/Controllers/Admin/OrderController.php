<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

      $orderNews = Order::where('status', 0)->get();
      $orderProccess = Order::where('status', 1)->get();
      $orderSend = Order::where('status', 2)->get();


      return view('admin.order.index', compact('orderNews', 'orderProccess', 'orderSend'));
    }
    public function show(Order $order){
     
      return view('admin.order.show', compact('order'));
    }
}
