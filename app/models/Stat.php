<?php

class Stat extends Eloquent 
{


	// A Stat belongs to many Users.
	public function user() {

		return $this->belongsToMany('User');
	}

	// A stat belongs to many projects
	public function project() {
		return $this->belongsToMany('Project');
	}

}