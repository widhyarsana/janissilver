<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::get();

        return view('admin.shipment.index', compact('shipments'));
    }

    public function store(Order $order)
    {

        $now = date("Ymdhis");
        $code = 'SM-' . $now;

        $order->status = 2;
        $order->save();

        $shipment = new Shipment();

        $shipment->order_id = $order->id;
        $shipment->date = Carbon::now();
        $shipment->code = $code;
        $shipment->save();

        return redirect(route('admin.shipment.index'))->with('shipment', 'Berhasil memproses ke pengiriman');
    }
}
