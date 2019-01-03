<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->text('description', 65535)->nullable();
            $table->string('run_time', 191)->nullable();
            $table->string('episode', 191)->nullable();
            $table->string('url', 191)->nullable();
            $table->integer('free')->default(0);
			$table->integer('status')->default(0);
			$table->integer('views')->default(0);
			$table->string('image', 191)->nullable();
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
        Schema::dropIfExists('videos');
    }
}
