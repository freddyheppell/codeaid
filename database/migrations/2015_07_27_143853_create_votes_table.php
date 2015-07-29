<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->integer('snip_id')->unsigned();

            $table->char('type', 1);

            $table->timestamps();
        });

        Schema::table('votes', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('snip_id')->references('id')->on('snips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
    }
}
