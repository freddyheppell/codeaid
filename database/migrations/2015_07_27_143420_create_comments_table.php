<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');

            $table->text('content');

            $table->integer('user_id')->unsigned();

            $table->integer('snip_id')->unsigned()->onDelete('cascade');

            $table->timestamps();
        });
        Schema::table('comments',function(Blueprint $table) {
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
        Schema::drop('comments');
    }
}
