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
			// Rows that will be filled in at registration.
			$table->increments('id');
			$table->string('firstname', 50);
			$table->string('lastname', 50);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->timestamps();

			//All these rows are nullable because they are to be filled after registration. 
			$table->text('description')->nullable();
			$table->integer('city_id')->unsigned()->nullable();
			$table->string('address', 120)->nullable();
			$table->string('zipcode')->nullable();
			$table->string('phone')->nullable();


			$table->string('token', 100);
			$table->rememberToken();
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
