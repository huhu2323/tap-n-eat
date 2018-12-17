<?php

namespace App;

use App\Category;
use App\Inventory;
use App\Rating;
use App\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }


    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function ratings()
    {
    	return $this->hasMany(Rating::class)->latest();
    }

    public function firstFive()
    {
        return $this->hasMany(Rating::class)->latest()->limit(5);
    }

    public function ratingOnly()
    {
        return $this->hasMany(Rating::class)->latest()->pluck('rate');
    }

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }
}
