<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration {

	public function up()
	{
		Schema::create('references', function(Blueprint $table)
		{
			/* This is the references table. */
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('company', 100);
			$table->string('firstname', 50);
			$table->string('lastname', 50);
			$table->string('email', 100);
			$table->integer('phone');

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	public function down()
	{
		Schema::drop('references');
	}

}
