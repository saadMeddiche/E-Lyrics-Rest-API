<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('artist_id');
            $table->integer('user_id');
            $table->integer('album_id');



            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('album_id')->references('id')->on('albums');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music');
    }
};
