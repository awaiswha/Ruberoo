<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectItemsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('user_idFk')->unsigned();
            $table->integer('project_idFk')->unsigned();
            $table->integer('s_cat_idFk')->unsigned();
            $table->timestamps();
        });

        Schema::table('project_items', function($table) {
            $table->foreign('user_idFk')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('project_idFk')->references('project_id')->on('projects')->onDelete('restrict');
            $table->foreign('s_cat_idFk')->references('s_cat_id')->on('size_categories')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_items');
    }
}
