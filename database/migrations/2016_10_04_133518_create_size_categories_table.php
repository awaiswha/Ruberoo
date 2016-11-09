<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_categories', function (Blueprint $table) {
            $table->increments('s_cat_id');
            $table->string('s_cat_name');
            $table->enum('s_cat_status', array(1, 0))->default(1);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('size_categories');
    }
}
