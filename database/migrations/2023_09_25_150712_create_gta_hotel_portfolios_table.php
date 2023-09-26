<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtaHotelPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gta_hotel_portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('Jpd_code');
            $table->string('has_synonyms');
            $table->text('address');
            $table->text('zip_code');
            $table->text('latitude');
            $table->text('longitude');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('gta_zones')->onDelete('cascade');
            $table->unsignedBigInteger('hotel_category_id');
            $table->foreign('hotel_category_id')->references('id')->on('gta_hotel_catalogues')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('gta_cities')->onDelete('cascade');


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
        Schema::dropIfExists('gta_hotel_portfolios');
    }
}
