<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_booking_guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('isLead')->default(false);
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
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
        Schema::dropIfExists('hotel_booking_guests');
    }
}
