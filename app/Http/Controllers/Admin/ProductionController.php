<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;

class ProductionController extends Controller
{
    public function index(){
        $productions = Production::get();

        return view('admin.production.index', compact('productions'));
    }

    public function store(Order $order){

        $now = date("Ymdhis");
        $code = 'PD-' . $now;

        $order->status = 1;
        $order->save();

        $production = new Production();

        $production->order_id = $order->id;
        $production->date = Carbon::now();
        $production->code = $code;
        $production->save();


        return redirect(route('admin.production.index'))->with('production', 'Berhasil memproses ke produksi');

    }
}
