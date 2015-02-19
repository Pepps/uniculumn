<?php

class Project extends Eloquent 
{

	/* A Project has one user, unless there are several users that share one Project.
	This functionality will be added later on most probably. */
	public function user()
	{
		return $this->hasOne('User');
	}

	/* A Project may have many categories. 
	A Project can be either a game Project or webdevelopment Project. */
	public function category()
	{
		return $this->hasMany('Category');
	}

	/*A Project has only one Stat though. One Stat per Project.
	Once a Project is created a Stat will be created. */
	public function stat()
	{
		return $this->hasOne('Stat');
	}





}