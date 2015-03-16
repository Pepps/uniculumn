<?php

class Experience extends Eloquent
{


	// An Experience belongs to many User.
	public function user() {
		return $this->belongsTo('User');
	}

	// An Experience has many different Categories.
	public function category() {
		return $this->belongsToMany('Category');
	}

	//Experience belongs to a city
	public function city() {
		return $this->belongsTo('City');
	}

	//An experience has many references
	public function reference() {
		return $this->hasMany('Reference');
	}

}
