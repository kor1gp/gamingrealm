<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_counters', function (Blueprint $table) {
            $table->unsignedBigInteger('hero_id');
            $table->unsignedBigInteger('item_id');
            $table->primary(['hero_id', 'item_id']);

            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items
            ')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('item_counters');
    }
};