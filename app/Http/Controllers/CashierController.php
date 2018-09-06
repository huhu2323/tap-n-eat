<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CashierController extends Controller
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

        
      
      Session::flash('module', 'cashier');
       $orders = $orders->withPath('?search='.$request->search.'&per_page='.$request->per_page);
         return view('page.cashier.index', compact('orders'));
    }

     public function pay($id)
    {
      if (!Auth::user()->can('cashier'))
        {
            return abort(403);
        }
    	$orders = Order::find($id);
    	Session::flash('module', 'cashier');

     return view('page.cashier.receipt',compact('orders'));
    }	

}
