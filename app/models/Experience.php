<?php

class Experience extends Eloquent
{


	// An Experience belongs to many User.
	public function user() {
		return $this->belongsTo('User');
	}

	// An Experience has many different Categories.
	public function category() {
		return $this->hasMany('Category');
	}

	//
	public function reference() {
		return $this->belongsTo('Reference');
	}

}
