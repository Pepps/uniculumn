<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('project_id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('user_id')->on('users');
			$table->string('project_title', 40);
			$table->timestamps();
			$table->text('project_body');
			$table->string('project_url', 60);
		});
	}


	public function down()
	{
		Schema::drop('projects');
	}

}
