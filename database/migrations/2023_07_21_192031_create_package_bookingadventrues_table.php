<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageBookingadventruesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_bookingadventrues', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('package_city_id');
            $table->foreign('package_city_id')->references('id')->on('package_cities')->onDelete('cascade');

            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            $table->unsignedBigInteger('package_day_id');
            $table->foreign('package_day_id')->references('id')->on('package_booking_days')->onDelete('cascade');

            $table->unsignedBigInteger('adventrue_id');
            $table->foreign('adventrue_id')->references('id')->on('package_activities')->onDelete('cascade');

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
        Schema::dropIfExists('package_bookingadventrues');
    }
}
