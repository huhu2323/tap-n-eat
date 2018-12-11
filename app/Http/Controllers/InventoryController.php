<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('view-product'))
        {
            return abort(403);
        }
       
        $products = Product::latest();
    
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
        $categories = Category::latest()->pluck('name', 'id');
        Session::flash('module', 'product');

        $products = $products->withPath('?search='.$request->search.'&per_page='.$request->per_page.'&category='.$request->category);
        return view ('page.inventory.index', compact('products', 'categories'));
    }

public function edit()
    {
        return view ('page.inventory.edit');
    }}
