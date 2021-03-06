<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExercisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercises', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('subject_id')->unsigned()->index('exercises_subject_id_foreign');
			$table->string('ex_number')->nullable();
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
		Schema::drop('exercises');
	}

}
