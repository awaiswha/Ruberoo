<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->integer('user_idFk')->unsigned();
            $table->integer('cat_idFk')->unsigned()->nullable();
            $table->string('project_title');
            $table->string('project_price');
            $table->text('project_desc');
            $table->string('project_color');
            $table->string('type')->nullable();
            $table->enum('project_status', array(1, 0))->default(1);
            $table->timestamps();
        });

        Schema::table('projects', function($table) {
            $table->foreign('user_idFk')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('cat_idFk')->references('cat_id')->on('categories')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
