<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResortsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resorts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('skimap_id')->unsigned();			// id from skimaps.org api
			$table->integer('skimap_region_id')->unsigned();	// id from skimaps.org api
			$table->string('name', 160);
			$table->string('region_name', 160);
			$table->string('website', 160)->nullable();
			$table->timestamps();
			
			$table->index('name');
			$table->index('skimap_region_id');
			$table->unique('skimap_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resorts');
	}

}
