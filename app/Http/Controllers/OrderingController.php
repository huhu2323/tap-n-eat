<?php

namespace App\Http\Controllers;

use App\Category;
use App\Member;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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
		->with(['orderItems', 'orderItems.product'])
		->get();
		return response()->json($orders);
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
		$order->total_price = $request->order['total_price'];
		$order->paid = 1;
		$order->status = 0;
		$order->table_number = 0;
		$order->member_id = $request->order['member_id'];
		if ($order->save())
		{
			foreach ($request->orderItem as $key => $value) {
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
			->whereHas('menu', function ($query) {
				$query->where('available', true);
			})
			->with('inventory')
			->with('category')
			->get();
		if ($prods->count())
		{
			return response()->json([
				'status' => true,
				'data' => $prods
			], 200);
		}
		else
		{
			return response()->json([
				'status' => false,
				'data' => $prods
			], 404);
		}
		
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

	public function login(Request $request)
	{
		
		$member = Member::where('username', $request->username)->first();

		// return $request->username;
		if ($member)
		{
			if (\Hash::check($request->password, $member->password))
			{
				return response()->json($member);
			}
			else
			{
				return 'error';
			}
		}
		else
		{
			return 'error';
		}
		
	}

	public function create(Request $request)
	{
		
		$validator =  Validator::make($request->all(), [
	        'username' => 'required|unique:members',
			'password' => 'required',
			'first_name' => 'required',
			'last_name' => 'required'
	    ]);

		if ($validator->fails()) {    
		    return response()->json($validator->messages(), 200);
		}

		$success = true;
		$member = new Member;
		$member->username = $request->username;
		$member->password = bcrypt($request->password);
		$member->first_name = $request->first_name;
		$member->last_name = $request->last_name;
		$member->credit = 0;
		if ($member->save()) {
			return response()->json(['success' => $member]);
		}
		return response()->json('failed');
	}

	public function index()
	{
		$orders = Order::latest()->with('orderItems')->get();
		dd($orders);
	}

	public function reserve(Request $request)
	{
		$validator =  Validator::make($request->all(), [
			'member_id' => 'required',
			'total_person' => 'required',
			'reserve_date' => 'required',
			'reserve_time' => 'required'
	    ]);

		if ($validator->fails()) {    
		    return response()->json($validator->messages(), 200);
		}

		$success = true;
		$reserve = new Reservation;
		$reserve->table_number = 0;
		$reserve->transaction = $request->transaction;
		$reserve->member_id = $request->member_id;
		$reserve->total_person = $request->total_person;
		$reserve->table_avail = true;
		$reserve->reserve_date = $request->reserve_date;
		$reserve->reserve_time = $request->reserve_time;
		$reserve->status = false;
		if ($reserve->save()) {
			return response()->json(['success' => $reserve]);
		}
	}

	public function filteredProducts(Category $category)
	{
		return response()->json($category->products());
	}

}