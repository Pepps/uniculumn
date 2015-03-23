<?php

class Experience extends Eloquent
{


	// An Experience belongs to many User.
	public function user() {
		return $this->belongsTo('User');
	}

	// An Experience belongs to many different Categories.
	public function category() {
		return $this->belongsToMany('Category');
	}

	//Experience has a city
	public function city() {
		return $this->hasOne('City');
	}

	//An experience has many references
	public function reference() {
		return $this->hasMany('Reference');
	}

}
