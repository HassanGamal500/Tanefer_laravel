<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id')
                ->references('id')->on('tours')
                ->onDelete('cascade')->onUpdate('cascade');
            //$table->enum('passenger_type', ['Adult', 'Child'])->default('Adult');
            $table->integer('numberOfPassenger');
            $table->double('adult_price', 8, 2);
            $table->double('child_price', 8, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('repeat',50)->nullable();
            $table->enum('room_type', ['Single', 'Double','Triple'])->default('Single');
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
        Schema::dropIfExists('tour_prices');
    }
}
