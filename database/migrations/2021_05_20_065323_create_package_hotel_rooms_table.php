<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_hotel_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',191);
            $table->text('inclusions');
            $table->text('amenities');
            $table->integer('max_num_adult');
            $table->integer('max_num_children');
            $table->unsignedBigInteger('package_hotel_id');
            $table->foreign('package_hotel_id')
            ->references('id')->on('package_hotels')
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
        Schema::dropIfExists('package_hotel_rooms');
    }
}
