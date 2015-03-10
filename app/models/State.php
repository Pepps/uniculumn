<?php

class State extends Eloquent
{

	public function cities() {
		return $this->hasMany('City');
	}

}
