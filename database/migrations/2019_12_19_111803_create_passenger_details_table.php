<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('passenger_name');
            $table->string('passport_number')->nullable();
            $table->date('passport_expire_date')->nullable();
            $table->string('passport_issue_country')->nullable();
            $table->unsignedBigInteger('pnr_id')->index();
            $table->foreign('pnr_id')->references('id')->on('pnrs')->onDelete('cascade');
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
        Schema::dropIfExists('passenger_details');
    }
}
