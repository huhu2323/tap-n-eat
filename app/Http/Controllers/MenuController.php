<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{

    

    public function login(Request $request)
    {
    	$user = User::where('username', $request->username)->first();
    	if (!isset($user->username))
    	{
    		return response()->json([]);
    	}
    	else
    	{
    		if (\Hash::check( $request->password , $user->password))
			{
				return response()->json($user);
			}
			else
			{
				return response()->json([]);
			}
    	}
    	return response()->json([]);
    }

    public function index(Request $request)
    {

        if (!Auth::user()->can('view-product'))
        {
            return abort(403);
        }
        $products = "";
        if ($request->filled('trashed'))
        {
            $products = Product::onlyTrashed()->latest();
        }
        else
        {
            $products = Product::latest();
        }

        if ($request->filled('category'))
        {
            $products = $products->where('category_id', '=', $request->category);
        }

        if ($request->filled('search'))
        {
            $products = $products->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('per_page'))
        {
            $products = $products->paginate($request->per_page);
        }
        else
        {
            $products = $products->paginate();
        }

        $deletedProducts = Product::onlyTrashed()->count();
        $categories = Category::latest()->pluck('name', 'id');
        Session::flash('module', 'product');

        if ( $request->trashed == 1 )
        {
            $products = $products->withPath('?trashed=1&search='.$request->search.'&per_page='.$request->per_page.'&category='.$request->category);
            return view('page.product.index', compact('products' , 'deletedProducts', 'categories'));
        }
        else
        {
            $products = $products->withPath('?search='.$request->search.'&per_page='.$request->per_page.'&category='.$request->category);
            return view ('page.product.index', compact('products' , 'deletedProducts', 'categories'));
        }
    }
}
