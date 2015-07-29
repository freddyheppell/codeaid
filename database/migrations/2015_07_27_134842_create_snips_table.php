<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snips', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->integer('language_id')->unsigned();

            $table->integer('user_id')->unsigned();

            $table->text('content');


            $table->timestamps();
        });
        Schema::table('snips',function(Blueprint $table){
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('snips');
    }
}
