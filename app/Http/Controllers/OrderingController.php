<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OrderingController extends Controller
{
	public function main()
	{
		return view('ordering.page.main');
	}

	public function jello()
	{
		return view('ordering.page.pdro');
	}

	public function kitchen()
	{
		$orders = Order::whereDate('created_at', Carbon::today())
		->where('status', '0')
		->get();
		return view('ordering.page.kitchen', compact('orders'));
	}

	public function product()
	{
		$products = Product::latest()->get();
		return view ('ordering.page.product', compact('products'));
	}

	public function orders(Request $request)
	{
		$orders = Order::whereDate('created_at', Carbon::today())
		->where('status', '0')
		->orderBy('created_at', 'desc')
		->get();
		return json_encode($orders);
	}

	public function categories(Request $request)
	{
		$categories = Category::all();
		return response()->json($categories);
	}

	public function orderProduct(Request $request)
	{
		$success = true;
		$order = new Order;
		$order->name = $request->order['name'];
		$order->total_price = $request->order['total_price'];
		$order->paid = 1;
		$order->status = 0;
		$order->member_id = $request->order['member_id'];
		if ($order->save())
		{
			foreach ($request->cart as $key => $value) {
				$orderItem = new OrderItem;
				$orderItem->product_id = $value["product_id"];
				$orderItem->order_id = $order->id;
				$orderItem->quantity = $value["quantity"];
				$orderItem->total_price = $value["total_price"];
				if (!$orderItem->save())
				{
					$success = false;
				}
			}
		}
		if ($success)
		{
			return response()->json('success');
		}
		else
		{
			return response()->json('failed');
		}
	}

	public function chooseCategory()
	{
		$categories = Category::all();
		return view('ordering.page.category', compact('categories'));
	}

	public function products(Request $request)
	{
		$prods = Product::latest()
			->with('category')
			->get();
		return response()->json($prods);
	}

	public function csrf()
	{
		return response()->json(csrf_token());
	}

	public function productsCategories(Request $request)
	{
		$products = Product::latest()->where('category_id', $request->id)->get();
		return response()->json($products);
	}

	public function member(Request $request)
	{
		
		$member = Member::where('username', $request->cred['username'])->first();
		if (\Hash::check($request->cred['password'], $member->password))
		{
			return response()->json($member);
		}
		else
		{
			return response()->json([]);
		}
	}

	public function create(Request $request)
	{
		$success = true;
		$member = new Member;
		$member->username = $request->cred['username'];
		$member->password = $request->cred['password'];
		$member->rfid = $request->cred['rfid'];
		$member->first_name = $request->cred['fname'];
		$member->middle_name = $request->cred['mname'];
		$member->last_name = $request->cred['lname'];
		$member->address = $request->cred['address'];
		$member->contact = $request->cred['contact'];
		

		if (!$member->save()) {
			$success = false;
		}

		if ($success)
		{
			return response()->json('success');
		}
		else
		{
			return response()->json('failed');
		}
	}

	public function reserve(Request $request)
	{
		$success = true;
		$reserve = new Reservation;
		$reserve->table_number = $request->cred['table_number'];
		$reserve->member_name = $request->cred['member_name'];
		$reserve->total_person = $request->cred['member_name'];
		$reserve->table_avail = $request->cred['table_avail'];
		$reserve->reserve_date = $request->cred['reserve_date'];
		$reserve->reserve_time = $request->cred['reserve_time'];
		$reserve->reserve_time = 1;
		if (!$reserve->save()) {
			$success = false;
		}
		if ($success)
		{
			return response()->json('success');
		}
		else
		{
			return response()->json('failed');
		}
	}

}