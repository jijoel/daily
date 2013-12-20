<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateStatesTable extends Migration 
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function(Blueprint $table) {
            $table->increments('id');
            $table->string('country_code',2);
            $table->string('state_code',2);
            $table->string('state_name',25);
            $table->index('state_name');
            $table->index('state_code');
            $table->unique(array('country_code','state_code'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }

}
