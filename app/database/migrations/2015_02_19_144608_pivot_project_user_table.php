<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotProjectUserTable extends Migration {

	public function up()
	{
		/* Here we create a pivot table between the users and their projects.
		This enables us to extract projects from specified users. */
		Schema::create('project_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('project_user');
	}

}
