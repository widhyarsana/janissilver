<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $customers = User::role('customer')->get();
        $products = Product::get();

        $orders = Order::get();

        //order status
        $ordersIn = Order::where('status', 0)->get();
        $ordersProccess = Order::where('status', 1)->get();
        $ordersOut = Order::where('status', 2)->get();



        // order hari ini
        $ordersToday = Order::whereDate('created_at', Carbon::today())->get();
        $ordersToday6 = Order::whereDate('created_at', Carbon::today())->take(6)->get();
        //order minggu ini
        $starWeek = Carbon::now()->startOfWeek()->format('Y-m-d H:i'); //awal minggu
        $endWeek = Carbon::now()->endOfWeek()->format('Y-m-d H:i'); // akhir minggu
        $thisWeek = Order::whereBetween('created_at', [$starWeek, $endWeek])->get();
        $thisWeek6 = Order::whereBetween('created_at', [$starWeek, $endWeek])->take(6)->get();
        //order bulan ini
        $starMonth = Carbon::now()->startOfMonth()->format('Y-m-d H:i'); // awal bulan
        $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d H:i'); // akhir bulan
        $thisMonth = Order::whereBetween('created_at', [$starWeek, $endWeek])->get();
        $thisMonth6 = Order::whereBetween('created_at', [$starWeek, $endWeek])->take(6)->get();





        // total order
        $customerCount = $customers->count();
        $productCount = $products->count();
        $ordersCount = $orders->count();
        $ordersInCount = $ordersIn->count();
        $ordersProccessCount = $ordersProccess->count();
        $ordersOutCount = $ordersOut->count();
        $ordersTodayCount = $ordersToday->count();
        $thisWeekCount = $thisWeek->count();
        $thisMonthCount = $thisMonth->count();




        return view('index', compact(
            'customerCount',
            'productCount',
            'ordersInCount',
            'ordersProccessCount',
            'ordersOutCount',
            'ordersCount',
            'ordersTodayCount',
            'thisWeekCount',
            'thisMonthCount',
            'ordersToday6',
            'thisWeek6',
            'thisMonth6'
        ));
    }
}
