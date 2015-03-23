<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $table = 'users';

	protected $hidden = array('password', 'remember_token', 'pdir',
														'created_at', 'updated_at', 'token',
														'remeber_token', 'FBtoken', 'googletoken');

	// A User belongsToMany projects.
	public function project() {
		return $this->belongsToMany('Project', 'project_user');
	}

	// A User has many experiences.
	public function experience() {
		return $this->hasMany('Experience');
	}

	// A User has many references.
	public function reference() {
		return $this->hasMany('Reference');
	}

	/* A User has one Stat.
	Once a User is created a Stat will be created. */
	//We do not have any stats implemented.
	public function stat() {
		return $this->hasOne('Stat');
	}

        // model function to store form data to database
     public static function saveFormData($data) {
            DB::table('users')->insert($data);
     }

     // A user belongs to many categories, or belongs to many "interests"
     public function categories() {
     	return $this->belongsToMany('Category', 'interests', 'user_id', 'category_id');
     }

}
