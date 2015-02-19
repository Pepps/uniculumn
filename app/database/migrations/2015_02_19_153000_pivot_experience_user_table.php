<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotExperienceUserTable extends Migration {

	public function up()
	{
		/* Here we create a pivot table between the users and their experiences.
		This enables us to extract experiences from specified users. */
		Schema::create('experience_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('experience_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('experience_user');
	}

}
