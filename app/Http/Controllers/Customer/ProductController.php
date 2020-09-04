<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        // session()->flush();
        $products = Product::get();
       return view('customer.product.index', compact('products'));
    }

    
}
