<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLikesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_likes', function (Blueprint $table) {
            $table->increments('like_id');
            $table->integer('user_idFk')->unsigned();
            $table->integer('visitor_idFk')->unsigned();
            $table->enum('like_status', array(1, 0))->default(1);
            $table->timestamps();
        });

        Schema::table('user_likes', function($table) {
            $table->foreign('user_idFk')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('visitor_idFk')->references('user_id')->on('users')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_likes');
    }

}
