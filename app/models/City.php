<?php

class City extends Eloquent
{

	public function states() {
		return $this->belongsTo('State');
	}


}
