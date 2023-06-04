<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePackageHotelRoomsIdColumnToNullableInPackageCityHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_city_hotels', function (Blueprint $table) {
            $table->unsignedBigInteger('package_hotel_rooms_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nullable_in_package_city_hotel', function (Blueprint $table) {
            //
        });
    }
}
