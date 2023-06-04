<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->string('zipCode',255)->nullable();
            $table->string('contact_phone',255)->nullable();
            $table->string('contact_email',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('streetLine',255)->nullable();



            $table->foreign('booking_id')
                ->references('id')->on('bookings')
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
        Schema::dropIfExists('booking_data');
    }
}
