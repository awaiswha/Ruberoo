<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('deal_id');
            $table->string('address');
            $table->string('phone_no');
            $table->string('total_price');
            $table->string('buyer_review');
            $table->string('seller_review');
            $table->integer('total_items');
            $table->integer('buyer_idFk')->unsigned();
            $table->integer('seller_idFk')->unsigned();
            $table->integer('project_idFk')->unsigned();
            $table->enum('deal_status',array('Pending','Active', 'Canceled', 'Completed'))->default('Pending');
            $table->enum('payment_status',array(1,0))->default(0);
            $table->timestamps();
        });

        Schema::table('deals', function($table) {
            $table->foreign('buyer_idFk')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('seller_idFk')->references('user_id')->on('users')->onDelete('restrict');
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
        Schema::drop('deals');
    }
}
