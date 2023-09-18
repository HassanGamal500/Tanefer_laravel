<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPassportCruiseIdColumnsInPackageBookingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_booking_data', function (Blueprint $table) {
            $table->unsignedBigInteger('cruise_id');
            $table->foreign('cruise_id')->references('id')->on('cruises')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_booking_data', function (Blueprint $table) {
            //
        });
    }
}
