<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration {

	public function up()
	{
		Schema::create('experiences', function(Blueprint $table)
		{
			/* This is the experiences table. */
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->timestamps();
			$table->string('title', 100);
			$table->text('description');
			$table->string('duration', 30);
		});
	}

	public function down()
	{
		Schema::drop('experiences');
	}

}
