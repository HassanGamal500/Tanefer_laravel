<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTravellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_travellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->char('passengerTitle')->nullable();
            $table->enum('passengerGender',['male','female'])->nullable();
            $table->string('passengerFirstName',255)->nullable();
            $table->string('passengerLastName',255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passengerType',100)->nullable();
            $table->string('passport_issue_country',100)->nullable();

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
        Schema::dropIfExists('booking_travellers');
    }
}
