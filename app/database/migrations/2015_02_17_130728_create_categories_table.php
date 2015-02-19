<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			/* This is the categories table. */
			$table->increments('id');
			$table->string('category_title', 50);
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('categories');
	}

}
