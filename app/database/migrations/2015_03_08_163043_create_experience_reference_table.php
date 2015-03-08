<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExperienceReferenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experience_reference', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('experience_id')->unsigned()->index();
			$table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
			$table->integer('reference_id')->unsigned()->index();
			$table->foreign('reference_id')->references('id')->on('references')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('experience_reference');
	}

}