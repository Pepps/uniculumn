<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			/* This is the projects table. */
			$table->increments('id');
			$table->string('title', 40)->unique();
			$table->timestamps();
			$table->text('body');
			// 0 is equal to Job ("Jobb"), 1 is equal to Education ("Utbildning") and 2 is equal to Skills ("merit"), and 3 is övrigt. 
			$table->integer('type');
			$table->integer('owner_id')->unsigned();

			$table->foreign('owner_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
