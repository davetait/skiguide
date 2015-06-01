<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guides', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resort_id')->unsigned();
			$table->integer('ski_map_id')->unsigned();	// id of map from skimaps.org
			$table->text('point_data');					// point data from jsdraw2d (http://jsdraw2d.jsfiction.com/#demo)
			$table->text('label_data');
			$table->string('name', 60);
			$table->string('summary', 500);
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('resort_id')->references('id')->on('resorts');
			$table->foreign('user_id')->references('id')->on('users');
			$table->index('ski_map_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guides');
	}

}
