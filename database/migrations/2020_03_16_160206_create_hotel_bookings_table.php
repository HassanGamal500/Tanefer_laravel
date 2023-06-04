<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_number')->nullable();
            $table->string('trip_id')->nullable();
            $table->string('contact_name_person');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('payment_auth_code')->nullable();
            $table->string('payment_transaction_id')->nullable();
            $table->string('total_amount');
            $table->string('hotel_name');
            $table->string('hotel_code');
            $table->string('booking_status');
            $table->string('payment_status');
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
        Schema::dropIfExists('hotel_bookings');
    }
}
