<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $dates = ['reserve_date', 'created_at', 'updated_at'];
}
