<?php

class City extends Eloquent
{

	// A city belongs to a state
	public function states() {
		return $this->belongsTo('State');
	}
	// A city belongs to many experiences
	public function experience() {
		return $this->belongsToMany('Experience');
	}


}
