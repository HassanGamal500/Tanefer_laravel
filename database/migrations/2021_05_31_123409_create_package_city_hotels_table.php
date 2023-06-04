<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCityHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_city_hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_city_id');
            $table->unsignedBigInteger('package_hotel_id');
            $table->unsignedBigInteger('package_hotel_rooms_id');

            $table->foreign('package_city_id')
                ->references('id')->on('package_cities')
                ->onDelete('cascade');

            $table->foreign('package_hotel_id')
                ->references('id')->on('package_hotels')
                ->onDelete('cascade');

            $table->foreign('package_hotel_rooms_id')
                ->references('id')->on('package_hotel_rooms')
                ->onDelete('cascade');
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
        Schema::dropIfExists('trip_hotels');
    }
}
