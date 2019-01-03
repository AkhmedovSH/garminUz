<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolutionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solutions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('exercise_id')->unsigned();
			$table->integer('user_id');
			$table->integer('status')->default(0);
			$table->text('answer', 65535)->nullable();
			$table->string('result')->nullable();
			$table->float('rating', 10, 0)->default(3);
			$table->string('image')->nullable();
			$table->string('relate', 50)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solutions');
	}

}
