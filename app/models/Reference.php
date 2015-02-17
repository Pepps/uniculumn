<?php

class Reference extends Eloquent 
{
protected $table = 'references';

	public function user()
	{
		return $this->belongsToMany('User');
	}

}