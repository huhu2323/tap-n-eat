<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Member extends Model
{
    //
	use SoftDeletes, HasApiTokens;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public function fullName()
    {
    	return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }
    


}
