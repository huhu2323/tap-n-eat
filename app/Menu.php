<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
   	public function product()
   	{
   		return $this->belongsTo(Product::class);
   	}

   	public function getButton()
   	{
   		if ($this->available)
   		{
   			return '<a class="btn btn-danger miguel" data-link="'. route('home') .'" data-id="' . $this->id . '"><i class="fa fa-ban"></i> Hide in menu </a>';
   		}
   		return '<a class="btn btn-success miguel" data-link="'. route('home') .'" data-id="' . $this->id . '"><i class="fa fa-eye"></i> Show in menu </a>';
   	}

   	public function setBgColor()
   	{
   		if ($this->available)
   		{
   			return '#00aaff';
   		}
   		return '#f4645f';
   	}
}
