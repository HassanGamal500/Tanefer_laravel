<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->integer('nights_number');
            $table->enum('transportation_type',['limousine','train','flight']);
            $table->unsignedBigInteger('package_hotel_id')->nullable();
            $table->unsignedBigInteger('package_hotel_rooms_id')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')->on('bookings')
                ->onDelete('cascade');

//            $table->foreign('city_id')
//                ->references('id')->on('tour_cities')
//                ->onDelete('set null');
//
//            $table->foreign('package_hotel_id')
//                ->references('id')->on('package_hotels')
//                ->onDelete('set null');
//
//            $table->foreign('package_hotel_rooms_id')
//                ->references('id')->on('package_hotel_rooms')
//                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_cities');
    }
}
