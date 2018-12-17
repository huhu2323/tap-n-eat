<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Menu;
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
        $week = strtolower(\Carbon\Carbon::today()->format('l'));
        if ($request->week)
        {
            $week = $request->week;
        }
        Session::flash('module', 'product');
        $menus = Menu::latest()
                ->where('day', $week)
                ->orWhere('day', 'everyday')
                ->orWhere('available', true)
                ->get();
        return view ('page.menu.index', compact('menus', 'week'));
    }

    public function set(Request $request, Product $product)
    {
        $menu = $product->menu;
        $menu->available = !$menu->available;
        $menu->save();
        return $menu;
    }
}
