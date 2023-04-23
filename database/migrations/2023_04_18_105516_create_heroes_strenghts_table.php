<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hero_strengths', function (Blueprint $table) {
            $table->unsignedBigInteger('hero_id');
            $table->unsignedBigInteger('strong_against_hero_id');
            $table->primary(['hero_id', 'strong_against_hero_id']);

            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
            $table->foreign('strong_against_hero_id')->references('id')->on('heroes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_strengths');
    }
};
