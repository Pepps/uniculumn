<?php

class State extends Eloquent
{

	// A state has many cities
	public function cities() {
		return $this->hasMany('City');
	}

}
