<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 50);
			$table->string('lastname', 50);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->timestamps();

			$table->integer('city_id')->unsigned()->nullable();
			$table->string('address', 120)->nullable();
			$table->integer('postnumber')->nullable();
			$table->integer('phone')->nullable();


			$table->string('token', 100);
			$table->rememberToken();
			$table->string('FBtoken', 255);
			$table->string('googletoken', 255);
			$table->string('pdir', 60);

			$table->foreign('city_id')->references('id')->on('cities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
