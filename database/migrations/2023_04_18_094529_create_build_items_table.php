<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildItemsTable extends Migration
{
    public function up()
    {
        Schema::create('build_items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_build_id');
            $table->unsignedBigInteger('item_id');
            $table->primary(['item_build_id', 'item_id']);

            $table->foreign('item_build_id')->references('id')->on('item_builds')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('build_items');
    }
}