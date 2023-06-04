<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCancellationDeadlineAndBookingStatusColumnsToHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_bookings', function (Blueprint $table) {
            $table->string('tbo_booking_status')->nullable();
            $table->date('last_cancellation_deadline')->nullable();
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
            $table->dropColumn('tbo_booking_status');
            $table->dropColumn('last_cancellation_deadline');
        });
    }
}
