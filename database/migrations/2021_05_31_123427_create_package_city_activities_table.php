<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCityActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_city_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_city_id');
            $table->unsignedBigInteger('package_activity_id');

            $table->foreign('package_city_id')
                ->references('id')->on('package_cities')
                ->onDelete('cascade');

            $table->foreign('package_activity_id')
                ->references('id')->on('package_activities')
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
        Schema::dropIfExists('trip_activities');
    }
}
