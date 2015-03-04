<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		/* This is the users table. */
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 50);
			$table->string('lastname', 50);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->timestamps();

			$table->integer('city_id')->unsigned();
			$table->string('address', 120);
			$table->integer('postnumber');
			$table->integer('phone');


			$table->string('token', 100);
			$table->rememberToken();
			$table->string('FBtoken', 255);
			$table->string('googletoken', 255);
			$table->string('pdir', 60);

			$table->foreign('city_id')->references('id')->on('cities');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}
