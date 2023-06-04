<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRoomTypeAtPackageHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_hotel_rooms', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('package_hotel_rooms', function (Blueprint $table) {
            $table->string('type')->after('id');
            $table->enum('occupancy',['single','double','triple'])->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_hotel_rooms', function (Blueprint $table) {
            //
        });
    }
}
