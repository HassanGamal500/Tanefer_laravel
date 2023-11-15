<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCruiseChildrenPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruise_children_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('min');
            $table->integer('max');
            $table->double('children_Percentage');
            $table->unsignedBigInteger('cruise_id')->index()->nullable();
            $table->foreign('cruise_id')->on('cruises')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('package_hotel_room_id');
            $table->foreign('package_hotel_room_id')->on('package_hotel_rooms')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('package_hotel_season_id');
            $table->foreign('package_hotel_season_id')->on('package_hotel_room_seasons')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('cruise_children_packages');
    }
}
