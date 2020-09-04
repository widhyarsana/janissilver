<?php

namespace App\Http\Controllers\Report;

use App\Models\Shipment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ShipmentReportController extends Controller
{
    public function index()
    {

        $shipments = Shipment::get();

        return view('report.shipment.index', compact('shipments'));
    }

    public function store()
    {
        $start = request()->start;
        $end = request()->end;

        if ($start != null && $end != null) {
            $shipments = Shipment::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        } else if ($start != null && $end == null) {
            $shipments = Shipment::where('created_at', '>=', $start)->get();
        } else if ($start == null && $end != null) {
            $shipments = Shipment::where('created_at', '<=', $end)->get();
        } else if ($start == null && $end == null) {
            $shipments = Shipment::get();
        }

        
        if (request()->cetak) {
            $pdf = PDF::loadview('report.shipment.print', ['shipments' => $shipments]);
            return $pdf->download('laporan.pengiriman.pdf');
        } else {
            $message = 'Pencarian Berhasil';
            $rs['message'] = View::make('customer.cart.message')
                ->with('message', $message)
                ->render();
            $rs['content'] = View::make('report.shipment.content')
                ->with('shipments', $shipments)
                ->render();

            return response($rs);
        }
    }

    public function print()
    {
        return request();
        $start = request()->start;
        $end = request()->end;

        if ($start != null && $end != null) {
            $shipments = Shipment::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        } else if ($start != null && $end == null) {
            $shipments = Shipment::where('created_at', '>=', $start)->get();
        } else if ($start == null && $end != null) {
            $shipments = Shipment::where('created_at', '<=', $end)->get();
        } else if ($start == null && $end == null) {
            $shipments = Shipment::get();
        }
            $pdf = PDF::loadview('report.shipment.print', ['shipments' => $shipments]);
            return $pdf->download('laporan.pengiriman.pdf');
        
    }
}
