<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
	public function store(Request $request)
	{
		$rating = new Rating;
		$rating->member_id = $request->member_id;
		$rating->comment = $request->comment;
		$rating->product_id = $request->product_id;
		$rating->rate = $request->rate;
		if ($rating->save())
		{
			return $rating;
		}
		else
		{
			return 'error';
		}
	}
}
