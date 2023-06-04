<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCityTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_city_transportations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_city_id');
            $table->enum('type',['limousine','train','flight']);
            $table->date('date');
            $table->float('price_per_person')->nullable();
            $table->unsignedBigInteger('destination_city_id')->nullable();

            $table->foreign('package_city_id')
                ->references('id')->on('package_cities')
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
        Schema::dropIfExists('trip_transportations');
    }
}
