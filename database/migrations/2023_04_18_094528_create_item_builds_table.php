<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemBuildsTable extends Migration
{
    public function up()
    {
        Schema::create('item_builds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hero_id');
            $table->timestamps();

            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_builds');
    }
}