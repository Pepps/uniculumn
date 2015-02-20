<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotCategoryExperienceTable extends Migration {

	public function up()
	{
		/* Here we create a pivot table between the experiences and their categories.
		This enables us to see specified experiences and their given categories.  */
		Schema::create('category_experience', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index();
			$table->integer('experience_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('category_experience');
	}

}
