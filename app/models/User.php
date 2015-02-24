<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $table = 'users';
	protected $primaryKey = 'user_id';

	protected $hidden = array('password', 'remember_token');


	// A User has many projects.
	public function project()
	{
		return $this->hasMany('Project');
	}

	// A User has many experiences.
	public function experience()
	{
		return $this->hasMany('Experience');
	}

	// A User has many references.
	public function reference()
	{
		return $this->hasMany('Reference');
	}

	/* A User has one Stat.
	Once a User is created a Stat will be created. */
	public function stat()
	{
		return $this->hasOne('Stat');
	}
	public function getAuthPassword()
	{
		return $this->password;
	}

        // model function to store form data to database
     public static function saveFormData($data)
     {
            DB::table('users')->insert($data);
     }

}
