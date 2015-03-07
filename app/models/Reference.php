<?php

class Reference extends Eloquent
{

	// A Reference belongs to many Users.
	public function user() {
		return $this->belongsToMany('User');
	}

	// A reference has one experience.
	public function experience() {
		return $this->hasOne('Experience');
	}
}
