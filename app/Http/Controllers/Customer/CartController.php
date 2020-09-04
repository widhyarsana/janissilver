<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

    public function index(){

        $carts = session()->get('cart');
        return view('customer.cart.index', compact('carts'));
    }

    public function addToCart($id, $qty){
      

        $product = Product::find($id);

        $price = $product->price * $qty;

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    'product_id' => $id,
                    'product_name' => $product->name,
                    'product_qty' => $qty,
                    'price' => $price,
                    'materials' => $product->materials,
                    'varian' => $product->varian
                ]
            ];

            session()->put('cart', $cart);
            session()->flash('success', 'Berhasil menambahkan produk kekeranjang');
            return redirect()->back();
        }


       
        if (isset($cart[$id])) {
            $cart[$id]['product_qty'] = $cart[$id]['product_qty'] + $qty;
            $cart[$id]['price'] = $cart[$id]['price'] + $price;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Berhasil menambahkan produk kekeranjang');
        }

        $cart[$id] = [
            'product_id' => $id,
            'product_name' => $product->name,
            'product_qty' => $qty,
            'price' => $price,
            'materials' => $product->materials,
            'varian' => $product->varian
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Berhasil menambahkan produk kekeranjang');


    }

    public function deleteFromCart($id){
        $cart = session()->get('cart');

        unset($cart[$id]);

        session()->put('cart', $cart);
        session()->flash('success', 'Berhasil Menghapus');

        return redirect()->back();
    }

    public function checkout(){
       $carts = session()->get('cart');

        $now = date("Ymdhis");
        $code = 'OD-' . $now;

        $order = new Order();

        $order->date = Carbon::now();
        $order->customer_id = auth()->user()->id;
        $order->status = 0;
        $order->code = $code;

        $order->save();


        foreach($carts as $i => $cart){
            $orderProduct = new OrderProduct();

            $orderProduct->product_id = $i;
            $orderProduct->order_id = $order->id;
            $orderProduct->qty = $cart['product_qty'];
            $orderProduct->price = $cart['price'];

            $orderProduct->save();
        }

        session()->forget('cart');
        session()->flash('success', 'Order Berhasil');
        return redirect(route('customer.order.index'));
    }

    public function update(){
        
        $products = request()->product;
        $qty = request()->qty;

        $cart = session()->get('cart');   
        
        for($i=0; $i<count($qty); $i++){

            $product = Product::find($products[$i]);

            $price = ($product->price * $qty[$i]);

            $cart[$products[$i]]['product_qty'] = $qty[$i];
            $cart[$products[$i]]['price'] = $price;

        }

        session()->put('cart', $cart);

        $rs = [];
        $message = "Keranjang belanja berhasil diperbarui";

        $carts = session()->get('cart');
        $rs['message'] = View::make('customer.cart.message')
            ->with('message', $message)
            ->render();
        $rs['content'] = View::make('customer.cart.content')
            ->with('carts', $carts)
            ->render();
        
        return response($rs);
    }

}
