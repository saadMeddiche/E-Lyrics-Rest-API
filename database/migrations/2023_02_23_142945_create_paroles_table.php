<?php

use App\Enums\Langague;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paroles', function (Blueprint $table) {
            $table->id();
            $table->string('Parole');
            $table->enum('Langue', Langague::getValues())->default(Langague::ENGLISH);
            $table->string('ID_Music');
            $table->integer('User_Id');
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
        Schema::dropIfExists('paroles');
    }
};
