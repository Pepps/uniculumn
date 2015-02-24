<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			/* This is the projects table. */
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('title', 40);
			$table->timestamps();
			$table->text('body');
			$table->string('url', 60);
		});
	}


	public function down()
	{
		Schema::drop('projects');
	}

}
