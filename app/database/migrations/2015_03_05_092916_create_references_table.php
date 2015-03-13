<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('references', function(Blueprint $table)
		{
			/* This is the references table. */
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('experience_id')->unsigned();
			$table->string('firstname', 50);
			$table->string('lastname', 50);
			$table->string('email', 100);
			$table->integer('phone');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('experience_id')->references('id')->on('experiences');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('references');
	}

}
