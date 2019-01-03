<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('image')->nullable();
			$table->string('slug', 191)->unique();
			$table->string('isbn', 20);
			$table->string('author');
			$table->string('relate', 50)->nullable();
			$table->string('published', 15)->nullable();
			$table->integer('status')->default(0);
			$table->timestamps();
			$table->integer('category_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
