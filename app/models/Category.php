<?php

class Category extends Eloquent 
{


	// A Category belongs to many Projects.
	public function project()
	{
		return $this->belongsToMany('Project');
	}

	// A Category belongs to many Experiences.
	public function experience()
	{
		return $this->belongsToMany('Experience');
	}


}