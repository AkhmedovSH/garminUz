<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email', 191);
			$table->string('password', 191)->nullable();
			$table->string('provider', 20)->nullable();
			$table->string('provider_id', 191)->nullable();
			$table->integer('status')->default(0);
			$table->integer('solved')->default(0);
			$table->integer('points')->default(0);
			$table->string('ranks', 50)->default('Beginner');
			$table->string('ranks_image', 100)->default('beginner.png');
			$table->integer('views')->default(0);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('avatar', 191)->nullable()->default('no-image.png');
			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();
			$table->string('college')->nullable();
			$table->string('highschool')->nullable();
			$table->string('biography')->nullable();
			$table->string('shortinfo')->nullable();
			$table->string('telegram')->nullable();
			$table->string('facebook')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
