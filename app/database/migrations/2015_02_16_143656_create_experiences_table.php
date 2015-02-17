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
				$table->engine = 'InnoDB';
				$table->increments('experience_id');
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('user_id')->on('users');
				$table->timestamps();
				$table->string('ex_title', 100);
				$table->text('ex_description');
				$table->string('ex_duration', 30);
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
