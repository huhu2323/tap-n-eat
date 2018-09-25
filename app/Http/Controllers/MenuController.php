<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
