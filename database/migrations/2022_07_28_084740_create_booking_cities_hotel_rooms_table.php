<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCitiesHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_cities_hotel_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id')->index();
            $table->integer('number_of_rooms')->default(1);
            $table->string('room_type')->nullable();
            $table->string('room_occupancy')->nullable();
            $table->text('room_inclusions')->nullable();
            $table->text('room_amenities')->nullable();
            $table->text('room_categories')->nullable();
            $table->integer('room_max_number_of_adult');
            $table->integer('room_max_number_of_children')->default(0);
            $table->float('room_season_price_per_day');
            $table->float('total_price');
            $table->integer('duration');
            $table->date('season_start_date');
            $table->date('season_end_date');
            $table->unsignedBigInteger('booking_city_id')->index();

            $table->foreign('booking_city_id')->on('booking_cities')->references('id')
                ->onDelete('cascade');

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
        Schema::dropIfExists('booking_cities_hotel_rooms');
    }
}
