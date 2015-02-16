<?php

class Stat extends Eloquent 
{
protected $table = 'stats';

	public function user()
	{
		return $this->belongsToMany('User');
	}

}