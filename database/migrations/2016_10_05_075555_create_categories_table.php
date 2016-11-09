<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name');
            $table->integer('user_idFk')->unsigned();
            $table->enum('cat_status', array(1, 0))->default(1);
            $table->timestamps();
        });

        Schema::table('categories', function($table) {
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
        Schema::drop('categories');
    }
}
