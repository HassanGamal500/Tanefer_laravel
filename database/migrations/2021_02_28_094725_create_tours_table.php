<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('id')->on('tour_cities')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('duration', 100);
            $table->integer('rating')->default(0);
            $table->string('image', 100);
            $table->unsignedBigInteger('client_id')->default(1);
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('meals', 100)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
