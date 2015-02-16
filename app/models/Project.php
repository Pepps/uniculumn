<?php

class Project extends Eloquent 
{

protected $table = 'projects';

	public function user()
	{
		return $this->belongsToMany('User');
	}

	public function category()
	{
		return $this->hasMany('Category');
	}

	public function stat()
	{
		return $this->hasMany('Stat');
	}





}