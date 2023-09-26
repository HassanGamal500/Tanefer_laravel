<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackageCityId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_gta_hotels', function (Blueprint $table) {
            $table->unsignedBigInteger('package_city_id');
            $table->foreign('package_city_id')->references('id')->on('package_cities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_gta_hotels', function (Blueprint $table) {
            //
        });
    }
}
