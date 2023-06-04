<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightSegmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_segments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('flight_number');
            $table->string('airline');
            $table->string('departure_location');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->string('arrival_location');
            $table->date('arrival_date');
            $table->time('arrival_time');
            $table->string('flight_duration');
            $table->unsignedBigInteger('pnr_id')->index();
            $table->foreign('pnr_id')->references('id')->on('pnrs')->onDelete('cascade');
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
        Schema::dropIfExists('flight_segments');
    }
}
