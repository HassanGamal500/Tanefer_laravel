<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id')
                ->references('id')->on('tours')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->integer('numberOfAdults');
            $table->integer('numberOfChildren');
            $table->enum('room_type', ['Single', 'Double','Triple']);
            $table->double('total_price', 8, 2);
            $table->string('fullName',50);
            $table->string('Nationality',50)->nullable();
            $table->string('email',50);
            $table->string('phone',50);
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
        Schema::dropIfExists('tour_bookings');
    }
}
