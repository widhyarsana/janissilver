<?php

namespace App\Http\Controllers\Report;

use App\User;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class OrderReportController extends Controller
{
    public function index(){




        $customers = User::role('customer')->get();
        $orders = Order::get();

        $newJan = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 1)
                ->count();

        $newFeb = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 2)
                ->count();

        $newMar = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 3)
                ->count();

        $newApr = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 4)
                ->count();

        $newMei = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 5)
                ->count();

        $newJun = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 6)
                ->count();

        $newJul = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 7)
                ->count();

        $newAgu = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 8)
                ->count();

        $newSep = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 9)
                ->count();

        $newOkt = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 10)
                ->count();

        $newNop = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 11)
                ->count();

        $newDes = Order::whereYear('created_at', '=', 2020)
                ->where('status', 0)
                ->whereMonth('created_at', '=', 12)
                ->count();

        $new = [$newJan, $newFeb, $newMar, $newApr, $newMei, $newJun, $newJul, $newAgu, $newSep, $newOkt, $newNop, $newDes ];


        $proJan = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 1)
                ->count();

        $proFeb = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 2)
                ->count();

        $proMar = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 3)
                ->count();

        $proApr = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 4)
                ->count();

        $proMei = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 5)
                ->count();

        $proJun = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 6)
                ->count();

        $proJul = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 7)
                ->count();

        $proAgu = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 8)
                ->count();

        $proSep = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 9)
                ->count();

        $proOkt = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 10)
                ->count();

        $proNop = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 11)
                ->count();

        $proDes = Order::whereYear('created_at', '=', 2020)
                ->where('status', 1)
                ->whereMonth('created_at', '=', 12)
                ->count();

        $prod = [$proJan, $proFeb, $proMar, $proApr, $proMei, $proJun, $proJul, $proAgu, $proSep, $proOkt, $proNop, $proDes ];


        $sentJan = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 1)
                ->count();

        $sentFeb = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 2)
                ->count();

        $sentMar = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 3)
                ->count();

        $sentApr = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 4)
                ->count();

        $sentMei = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 5)
                ->count();

        $sentJun = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 6)
                ->count();

        $sentJul = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 7)
                ->count();

        $sentAgu = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 8)
                ->count();

        $sentSep = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 9)
                ->count();

        $sentOkt = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 10)
                ->count();

        $sentNop = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 11)
                ->count();

        $sentDes = Order::whereYear('created_at', '=', 2020)
                ->where('status', 2)
                ->whereMonth('created_at', '=', 12)
                ->count();

        $sent = [$sentJan, $sentFeb, $sentMar, $sentApr, $sentMei, $sentJun, $sentJul, $sentAgu, $sentSep, $sentOkt, $sentNop, $sentDes ];


       return view('report.order.index', compact('orders', 'customers', 'new', 'prod', 'sent'));
    }

    public function store(){

        $start = request()->start;
        $end = request()->end;
        $customer = request()->customer;
        $status = request()->status;

        if($start != null && $end != null && $customer != null && $status != null){
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->where('status', $status)->get();
        }else if($start != null && $end != null && $customer != null && $status == null){
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->get();
        }else if($start != null && $end != null && $customer == null && $status != null){
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('status', $status)->get();
        }else if($start != null && $end == null && $customer != null && $status != null) {
            $orders = Order::where('created_at', '>=', $start)->where('customer_id', $customer)->where('status', $status)->get();
        } else if($start == null && $end != null && $customer != null && $status != null) {
            $orders = Order::where('created_at', '<=', $end)->where('customer_id', $customer)->where('status', $status)->get();
        } else if ($start != null && $end != null && $customer == null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        } else if ($start != null && $end == null && $customer != null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->where('customer_id', $customer)->get();
        } else if ($start == null && $end != null && $customer != null && $status == null) {
            $orders = Order::where('created_at', '<=', $end)->where('customer_id', $customer)->get();
        } else if ($start != null && $end == null && $customer == null && $status != null) {
            $orders = Order::where('created_at', '>=', $start)->where('status', $status)->get();
        } else if ($start == null && $end != null && $customer == null && $status != null) {
            $orders = Order::where('created_at', '<=', $end)->where('status', $status)->get();
        } else if ($start == null && $end == null && $customer != null && $status != null) {
            $orders = Order::where('customer_id', $customer)->where('status', $status)->get();
        } else if ($start != null && $end == null && $customer == null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->get();
        } else if ($start == null && $end != null && $customer == null && $status == null) {
            $orders = Order::where('created_at', '<=', $end)->get();
        } else if ($start == null && $end == null && $customer != null && $status == null) {
            $orders = Order::where('customer_id', $customer)->get();
        } else if ($start == null && $end == null && $customer == null && $status != null) {
            $orders = Order::where('status', $status)->get();
        } else if ($start == null && $end == null && $customer == null && $status == null) {
            $orders = Order::get();
        }


        if(request()->cetak){
            $pdf = PDF::loadview('report.order.print', ['orders' => $orders]);
            return $pdf->download('laporan.pesanan.pdf');
        }else {
            $message = 'Pencarian Berhasil';
            $rs['message'] = View::make('customer.cart.message')
                ->with('message', $message)
                ->render();
            $rs['content'] = View::make('report.order.content')
                ->with('orders', $orders)
                ->render();

            return response($rs);
        }


    }

    public function print(){
        $start = request()->start;
        $end = request()->end;
        $customer = request()->customer;
        $status = request()->status;

        if ($start != null && $end != null && $customer != null && $status != null) {
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->where('status', $status)->get();
        } else if ($start != null && $end != null && $customer != null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->get();
        } else if ($start != null && $end != null && $customer == null && $status != null) {
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('status', $status)->get();
        } else if ($start != null && $end == null && $customer != null && $status != null) {
            $orders = Order::where('created_at', '>=', $start)->where('customer_id', $customer)->where('status', $status)->get();
        } else if ($start == null && $end != null && $customer != null && $status != null) {
            $orders = Order::where('created_at', '<=', $end)->where('customer_id', $customer)->where('status', $status)->get();
        } else if ($start != null && $end != null && $customer == null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        } else if ($start != null && $end == null && $customer != null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->where('customer_id', $customer)->get();
        } else if ($start == null && $end != null && $customer != null && $status == null) {
            $orders = Order::where('created_at', '<=', $end)->where('customer_id', $customer)->get();
        } else if ($start != null && $end == null && $customer == null && $status != null) {
            $orders = Order::where('created_at', '>=', $start)->where('status', $status)->get();
        } else if ($start == null && $end != null && $customer == null && $status != null) {
            $orders = Order::where('created_at', '<=', $end)->where('status', $status)->get();
        } else if ($start == null && $end == null && $customer != null && $status != null) {
            $orders = Order::where('customer_id', $customer)->where('status', $status)->get();
        } else if ($start != null && $end == null && $customer == null && $status == null) {
            $orders = Order::where('created_at', '>=', $start)->get();
        } else if ($start == null && $end != null && $customer == null && $status == null) {
            $orders = Order::where('created_at', '<=', $end)->get();
        } else if ($start == null && $end == null && $customer != null && $status == null) {
            $orders = Order::where('customer_id', $customer)->get();
        } else if ($start == null && $end == null && $customer == null && $status != null) {
            $orders = Order::where('status', $status)->get();
        } else if ($start == null && $end == null && $customer == null && $status == null) {
            $orders = Order::get();
        }

        $pdf = PDF::loadview('report.order.print', ['orders' => $orders]);
        return $pdf->download('laporan.pesanan.pdf');
    }
}
