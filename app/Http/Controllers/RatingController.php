<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{

	public function index(Product $product) {
		return $comments = $product->firstFive;
	}

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

	public function calculateRating(Product $product)
	{
		return response()->json($product->ratingOnly()->avg());
	}
}
