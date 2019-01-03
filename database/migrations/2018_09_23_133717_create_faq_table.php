<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title_ru', 191)->nullable();
			$table->string('title_uz', 191);
			$table->text('text_ru', 65535)->nullable();
			$table->text('text_uz', 65535);
			$table->integer('faq_category_id')->nullable();
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
		Schema::drop('faq');
	}

}
