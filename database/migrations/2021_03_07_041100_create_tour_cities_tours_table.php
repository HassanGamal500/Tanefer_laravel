<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourCitiesToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_cities_tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_city_id');
            $table->foreign('tour_city_id')
                ->references('id')->on('tour_cities')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id')
                ->references('id')->on('tours')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tour_cities_tours');
    }
}
