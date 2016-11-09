<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('profile_banner')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->integer('user_idFk')->unsigned();
            $table->timestamps();
        });

        Schema::table('user_profiles', function($table) {
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
        Schema::drop('user_profiles');
    }
}
