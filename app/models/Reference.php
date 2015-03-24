<?php

class Reference extends Eloquent
{

	// A Reference belongs to many Users.
	public function user() {
		return $this->belongsToMany('User');
	}

	// A reference belongs to experience.
	public function experience() {
		return $this->belongsTo('Experience');
	}

	// A reference has many states.
	public function states() {
		return $this->hasMany('State');
	}

	// A reference belongs to cities.
	public function cities() {
		return $this->belongsTo('City');
	}
}
