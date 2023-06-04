<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_booking_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vendor');
            $table->string('car_type');
            $table->string('pickup_location');
            $table->string('return_location');
            $table->date('pickup_date');
            $table->string('pickup_time');
            $table->date('return_date');
            $table->string('return_time');
            $table->float('extra_day_charge')->nullable();
            $table->float('extra_hour_charge')->nullable();
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
        Schema::dropIfExists('car_booking_details');
    }
}
