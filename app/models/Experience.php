<?php

class Experience extends Eloquent 
{
protected $table = 'experiences';

	public function user()
	{
		return $this->belongsToMany('User');
	}

	public function category()
	{
		return $this->hasMany('Category');
	}

}