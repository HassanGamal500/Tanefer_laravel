<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->unique();
            $table->string('name');
            $table->string('star');
            $table->text('address');
            $table->text('near_by_places')->nullable();
            $table->text('description');
            $table->string('country');
            $table->string('city');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('pinCode')->nullable();
            $table->double('map_latitude');
            $table->double('map_longitude');
            $table->text('facilities');
            $table->integer('tripAdivsorRating')->nullable();
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
        Schema::dropIfExists('hotel_details');
    }
}
