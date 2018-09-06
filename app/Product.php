<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Product extends Model
{
    use SoftDeletes, HasApiTokens;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
