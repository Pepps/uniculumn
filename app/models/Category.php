<?php

class Category extends Eloquent 
{
protected $table = 'categories';

	public function project()
	{
		return $this->belongsToMany('User');
	}

}