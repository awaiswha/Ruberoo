<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectVotesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_votes', function (Blueprint $table) {
            $table->increments('vote_id');
            $table->integer('user_idFk')->unsigned();
            $table->integer('project_owner')->unsigned();
            $table->integer('project_idFk')->unsigned();
            $table->enum('vote_status', array(1, 0))->default(1);
            $table->timestamps();
        });

        Schema::table('project_votes', function($table) {
            $table->foreign('user_idFk')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('project_owner')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('project_idFk')->references('project_id')->on('projects')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_votes');
    }
}
