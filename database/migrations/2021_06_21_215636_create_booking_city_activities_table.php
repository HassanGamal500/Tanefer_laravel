<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCityActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_city_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_city_id');
            $table->unsignedBigInteger('package_activity_id')->nullable();
            $table->float('price_per_person');
            $table->integer('day_number');

            $table->foreign('booking_city_id')
                ->references('id')->on('booking_cities')
                ->onDelete('cascade');

            $table->foreign('package_activity_id')
                ->references('id')->on('package_activities')
                ->onDelete('set null');

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
        Schema::dropIfExists('booking_city_activities');
    }
}
