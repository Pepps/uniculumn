<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotCategoryProjectTable extends Migration {

	public function up()
	{
		/* Here we create a pivot table between the projects and their categories.
		This enables us to extract projects from specified categories. */
		Schema::create('project_category', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned()->index();
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_category');
	}

}
