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
			//Title is the title of the job or type of education that the user has attended. 
			$table->string('title', 100);
			//Location is the actual place where the user has worked or studied. 
			$table->string('location', 100);
			// 0 is equal to Job ("Jobb"), 1 is equal to Education ("Utbildning") and 2 is equal to Skills ("merit"), and 3 is övrigt. 
			$table->integer('type');

			$table->timestamps();
			$table->string('description', 255);
			$table->integer('user_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('duration', 10);

			$table->foreign('city_id')->references('id')->on('cities');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('category_id')->references('id')->on('categories');
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
