<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDay055BlogTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('day055_blog', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->string('title',80);
            $table->text('text');
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
		Schema::dropIfExists('day055_blog');
	}

}
