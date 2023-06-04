<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstrainsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_hotels', function (Blueprint $table) {
            $table->foreign('tour_city_id')
                ->references('id')->on('tour_cities')
                ->onDelete('cascade');
        });

        // Schema::table('package_hotel_rooms', function (Blueprint $table) {
        //     $table->foreign('package_hotel_id')
        //         ->references('id')->on('package_hotels')
        //         ->onDelete('cascade');
        // });
        Schema::table('package_hotel_room_seasons', function (Blueprint $table) {
            $table->foreign('package_hotel_room_id')
                ->references('id')->on('package_hotel_rooms')
                ->onDelete('cascade');

            $table->foreign('package_hotel_season_id')
                ->references('id')->on('package_hotel_seasons')
                ->onDelete('cascade');
        });
        // Schema::table('package_hotel_images', function (Blueprint $table) {
        //     $table->foreign('package_hotel_id')
        //         ->references('id')->on('package_hotels')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


    }
}
