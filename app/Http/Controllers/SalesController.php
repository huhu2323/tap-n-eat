<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalesController extends Controller
{
    public function index(Request $request)
    {
    	if (!Auth::user()->can('cashier'))
        {
            return abort(403);
        }

        $orders = Order::latest();

      if ($request->filled('search'))
        {
            $orders = $orders->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('per_page'))
        {
            $orders = $orders->paginate($request->per_page);
        }
        else
        {
            $orders = $orders->paginate();
        }


        Session::flash('module', 'sales');
       $orders = $orders->withPath('?search='.$request->search.'&per_page='.$request->per_page);
        return view ('page.sales.index', compact('orders'));
    }
}
