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

	// A Category belongs to many Users
	public function category()
	{
		return $this->belongsToMany('Users', 'interests', 'user_id','category_id');
	}

}
