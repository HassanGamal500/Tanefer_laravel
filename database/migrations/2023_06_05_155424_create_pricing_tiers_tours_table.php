<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingTiersToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_tiers_tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('min');
            $table->integer('max');
            $table->double('adult_price');
            $table->double('child_percentage');
            $table->unsignedBigInteger('availabilities_tour_id');
            $table->foreign('availabilities_tour_id')->references('id')->on('availabilities_tours')->onDelete('cascade');
            $table->unsignedBigInteger('package_activity_id');
            $table->foreign('package_activity_id')->references('id')->on('package_activities')->onDelete('cascade');
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
        Schema::dropIfExists('pricing_tiers_tours');
    }
}
