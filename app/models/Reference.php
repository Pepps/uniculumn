<?php

class Reference extends Eloquent
{

	// A Reference belongs to many Users.
	public function user() {
		return $this->belongsToMany('User');
	}

}
