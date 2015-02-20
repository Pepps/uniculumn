<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotReferenceUserTable extends Migration {

	public function up()
	{
		/* Here we create a pivot table between the users and their references.
		This enables us to extract references from specified users. */
		Schema::create('reference_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('reference_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('reference_id')->references('id')->on('references')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('reference_user');
	}

}
