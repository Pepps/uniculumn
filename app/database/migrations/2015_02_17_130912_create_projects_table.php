<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			/* This is the projects table. */
			$table->increments('id');
			$table->string('title', 40);
			$table->timestamps();
			$table->text('body');
		});
	}


	public function down()
	{
		Schema::drop('projects');
	}

}
