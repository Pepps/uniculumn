<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experiences', function(Blueprint $table)
		{
			/* This is the experiences table. */
			$table->increments('id');
			$table->string('title', 100);
			// 1 is equal to Job ("Jobb"), 0 is equal to Education ("Utbildning") and 2 is equal to Skills ("merit"). 
			$table->integer('type');
			$table->timestamps();
			$table->string('description', 255);
			$table->integer('user_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->string('duration', 10);

			$table->foreign('city_id')->references('id')->on('cities');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('experiences');
	}

}
