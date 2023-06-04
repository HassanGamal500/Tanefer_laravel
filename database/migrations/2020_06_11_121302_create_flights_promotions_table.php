<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights_promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origin_code')->index();
            $table->string('destination_code')->index();
            $table->string('origin_img')->nullable();
            $table->string('destination_img')->nullable();
            $table->tinyInteger('week_number');
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->float('lowest_fare')->nullable();
            $table->integer('discount_amount');

            $table->foreign('origin_code')->references('code')->on('airports')
            ->onDelete('cascade');
            $table->foreign('destination_code')->references('code')->on('airports')
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
        Schema::dropIfExists('flights_promotions');
    }
}
