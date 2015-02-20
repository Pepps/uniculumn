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


