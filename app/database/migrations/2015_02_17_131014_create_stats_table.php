<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration {


	public function up()
	{
		Schema::create('stats', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('stat_id');
			$table->bigInteger('stat_count');	
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('project_id')->unsigned();

			$table->foreign('user_id')->references('user_id')->on('users');
			$table->foreign('project_id')->references('project_id')->on('projects');
		});
	}


	public function down()
	{
		Schema::drop('stats');
	}

}
