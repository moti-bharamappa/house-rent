<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForAdPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_photos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ads_id')->unsigned();
            $table->foreign('ads_id')->references('id')->on('ads')->onDelete('cascade');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_photos');
    }
}
