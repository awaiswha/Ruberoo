<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->increments('image_id');
            $table->integer('project_idFk')->unsigned();
            $table->text('project_img');
            $table->timestamps();
        });

        Schema::table('project_images', function($table) {
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
        Schema::drop('project_images');
    }
}
