<?php

class Category extends Eloquent
{

	// A Category belongs to many Projects.
	public function project()
	{
		return $this->belongsToMany('Project', 'project_category', 'project_id', 'category_id');
	}

	// A Category belongs to many Experiences.
	public function experience()
	{
		return $this->belongsToMany('Experience');
	}

	public function interests() {
		return $this->belongsToMany('Interest', 'interests', 'category_id', 'user_id');
	}
}
