<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('image_user', function (Blueprint $table) {
            $table->primary(['user_id', 'image_id']);

            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('image_id')->index();

            $table->timestamps();
            $table->integer('rating');
            $table->text('comment')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('image_user');
    }
}
