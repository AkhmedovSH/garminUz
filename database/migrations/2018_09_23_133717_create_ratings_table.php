<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('rating');
			$table->string('rateable_type')->index();
			$table->bigInteger('rateable_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->index(['rateable_type','rateable_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings');
	}

}
