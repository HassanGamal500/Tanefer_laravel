<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_booking_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_type');
            $table->string('room_code');
            $table->float('base_fare');
            $table->float('tax');
            $table->float('total_fare');
            $table->string('currency');
            $table->unsignedBigInteger('hotel_booking_id')->index();
            $table->foreign('hotel_booking_id')->references('id')->on('hotel_bookings')->onDelete('cascade');
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
        Schema::dropIfExists('hotel_booking_rooms');
    }
}
