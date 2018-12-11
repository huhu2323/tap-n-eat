<?php

namespace App;

use App\SurveyRate;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
	public function surveyRate()
	{
		return $this->hasMany(SurveyRate::class);
	}

}