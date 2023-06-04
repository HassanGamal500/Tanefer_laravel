<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHotelBookingsTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_bookings', function (Blueprint $table) {
            if(Schema::hasColumns('hotel_bookings',['booking_status','payment_status','tbo_booking_status'])){
                $table->dropColumn(['booking_status','payment_status','tbo_booking_status']);
            }
            $table->float('paid_price')->nullable();
            $table->string('price_change_factor')->nullable();
            $table->unsignedBigInteger('hotel_booking_status_id')->index()->nullable();
            $table->unsignedBigInteger('payment_status_id')->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_bookings', function (Blueprint $table) {
            //
        });
    }
}
