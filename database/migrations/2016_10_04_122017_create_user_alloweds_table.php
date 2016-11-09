<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAllowedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_alloweds', function (Blueprint $table) {
            $table->increments('allowed_id');
            $table->integer('number_of');
            $table->integer('per_project');
            $table->integer('price');
            $table->integer('user_idFk')->unsigned();
            $table->enum('allow_status',array(1,0))->default(0);
            $table->timestamps();
        });

        Schema::table('user_alloweds', function($table) {
            $table->foreign('user_idFk')->references('user_id')->on('users')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_alloweds');
    }
}
