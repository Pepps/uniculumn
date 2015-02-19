<?php

class Stat extends Eloquent 
{


	// A Stat belongs to many Users.
	public function user()
	{

		return $this->belongsToMany('User');
	}


}