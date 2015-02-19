<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $table = 'users';
	protected $primaryKey = 'user_id';

	 	protected $guarded = array();
        protected $table = 'users'; // table name
        public $timestamps = 'false'; // to disable default timestamp fields
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
		return $this->hasOne('Stat');
	}

}
