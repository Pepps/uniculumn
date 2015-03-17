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


	//
	public function reference() {
		return $this->hasMany('Reference', 'experience_reference', 'experience_id', 'reference_id');
	}

}
