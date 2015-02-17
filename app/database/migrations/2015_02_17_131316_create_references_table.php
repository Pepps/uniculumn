<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration {

	public function up()
	{
		Schema::create('references', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('reference_id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('user_id')->on('users');
			$table->string('company', 100);
			$table->string('ref_fname', 50);
			$table->string('ref_lname', 50);
			$table->string('ref_email', 100);
			$table->integer('ref_phone');
		});
	}

	public function down()
	{
		Schema::drop('references');
	}

}
