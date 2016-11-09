<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_files', function (Blueprint $table) {
            $table->increments('file_id');
            $table->integer('project_idFk')->unsigned();
            $table->text('project_file');
            $table->timestamps();
        });

        Schema::table('project_files', function($table) {
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
        Schema::drop('project_files');
    }
}
