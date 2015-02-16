<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function project() 
	{
		return $this->hasMany('Project');
	}

	public function experience()
	{
		return $this->hasMany('Experience');
	}

	public function reference()
	{
		return $this->hasMany('Reference');
	}

	public function stat()
	{
		return $this->hasMany('Stat');
	}

}
