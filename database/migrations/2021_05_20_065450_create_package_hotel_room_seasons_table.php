<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageHotelRoomSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_hotel_room_seasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('price_per_day');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('package_hotel_room_id');
            $table->unsignedBigInteger('package_hotel_season_id');
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
        Schema::dropIfExists('package_hotel_room_seasons');
    }
}
