<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function getStock()
    {
    	if (!$this->stock)
    	{
    		return "Out of stock";
    	}
    	return $this->stock;
    }

    public function getStockPerCycle()
    {
    	if (!$this->stock_per_cycle)
    	{
    		return "Not set";
    	}
    	return $this->stock_per_cycle;
    }
}
