<?php

class State extends Eloquent
{

	public function City() {
		return $this->hasMany('City');
	}

}
