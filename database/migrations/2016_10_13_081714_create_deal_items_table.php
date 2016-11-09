<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_items', function (Blueprint $table) {
            $table->increments('d_item_id');
            $table->integer('deal_idFk')->unsigned();
            $table->integer('s_cat_idFk')->unsigned();
            $table->integer('items');
            $table->timestamps();
        });

        Schema::table('deal_items', function($table) {
            $table->foreign('deal_idFk')->references('deal_id')->on('deals')->onDelete('restrict');
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
        Schema::drop('deal_items');
    }
}
