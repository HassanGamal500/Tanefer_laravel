<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPackageHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_hotel_rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('model_id')->index();
            $table->string('model_type');
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
            $table->dropIndex('package_hotel_rooms.model_id');
            $table->dropColumn(['model_id','model_type']);
        });
    }
}
