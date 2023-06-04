<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('tour_city_id');
            $table->tinyInteger('start')->default(0);

            $table->foreign('package_id')
                ->references('id')->on('packages')
                ->onDelete('cascade');

            $table->foreign('tour_city_id')
                ->references('id')->on('tour_cities')
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
        Schema::dropIfExists('trip_cities');
    }
}
