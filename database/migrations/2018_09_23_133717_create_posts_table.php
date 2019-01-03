<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->string('title_ru')->nullable();
			$table->string('slug', 191);
			$table->text('content', 65535);
			$table->text('content_ru', 65535)->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('status')->default(0);
			$table->integer('views')->default(0);
			$table->integer('is_featured')->default(0);
			$table->timestamps();
			$table->date('date')->nullable();
			$table->string('image', 191)->nullable();
			$table->text('description', 65535)->nullable();
			$table->text('description_ru', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
