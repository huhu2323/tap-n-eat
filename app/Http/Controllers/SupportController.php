<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function send(Request $request)
    {
    	$support = new Support;
    	$support->message = $request->message;
    	$support->table_number = $request->user;
        $support->new = true;
    	if ($support->save())
    	{
    		return "true";
    	}
    	else
    	{
    		return "false";
    	}
    }

    public function fetch()
    {
    	$support = Support::where('new',true)
            ->get();
    	return response()->json($support);
    }
}
