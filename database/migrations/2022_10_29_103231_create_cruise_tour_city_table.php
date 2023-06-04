<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCruiseTourCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruise_tour_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cruise_id')->index();
            $table->foreign('cruise_id')->on('cruises')
                ->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('tour_city_id')->index();

            $table->boolean('is_start')->default(0);

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
        Schema::dropIfExists('cruise_tour_city');
    }
}
