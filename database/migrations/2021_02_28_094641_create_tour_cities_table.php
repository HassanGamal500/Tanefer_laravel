<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 32);
            $table->char('code',3)->nullable();
            $table->char('countryCode',2)->nullable();
            $table->string('countryName',100)->nullable();
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
        Schema::dropIfExists('tour_cities');
    }
}
