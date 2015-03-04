<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration {

	public function up()
	{
		Schema::create('stats', function(Blueprint $table)
		{
			/* This is the stats table. */
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->bigInteger('count');	
			$table->timestamps();
			$table->integer('user_id');
			$table->integer('project_id');
		});
	}

	public function down()
	{
		Schema::drop('stats');
	}

}
