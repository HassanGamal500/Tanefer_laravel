<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDestinationCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destination_cities', function (Blueprint $table) {
            $table->string('hotel_name')->after('countryCode')->nullable();
            $table->string('hotel_address')->after('hotel_name')->nullable();
            $table->float('hotel_latitude')->after('hotel_address')->nullable();
            $table->float('hotel_longitude')->after('hotel_latitude')->nullable();
            $table->integer('hotel_star_rating')->after('hotel_longitude')->nullable();
            $table->integer('city_code')->index()->nullable();

            $table->string('cityName')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destination_cities', function (Blueprint $table) {
            //
        });
    }
}
