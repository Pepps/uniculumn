<?php

class City extends Eloquent
{

	public function State() {
		return $this->belongsTo('State');
	}
}
