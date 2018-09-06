<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalOrder = Order::count();
        $totalSale = count(OrderItem::whereDate('created_at', Carbon::today())->get());
        $totalSales = OrderItem::whereDate('created_at', Carbon::today())->sum('total_price');
        $totalUsers = User::count();
        $orders = Order::latest()->get();
        Session::flash('module', 'home');
        return view('page.dashboard', compact('totalOrder', 'totalSale', 'totalSales', 'totalUsers', 'orders'));
    }
}
