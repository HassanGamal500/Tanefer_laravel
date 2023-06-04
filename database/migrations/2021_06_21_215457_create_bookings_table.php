<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->double('trip_price_per_person');
            $table->unsignedBigInteger('city_start_id')->nullable();
            $table->boolean('start_with_flight')->default(0);
            $table->unsignedBigInteger('city_end_id')->nullable();
            $table->boolean('end_with_flight')->default(0);
            $table->double('accommodation_price')->nullable();
            $table->double('transport_price')->nullable();
            $table->double('itineraries_price')->nullable();
            $table->double('total_price');

            $table->timestamps();


            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('set null');

            $table->foreign('city_start_id')
                ->references('id')->on('tour_cities')
                ->onDelete('set null');

            $table->foreign('city_end_id')
                ->references('id')->on('tour_cities')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
