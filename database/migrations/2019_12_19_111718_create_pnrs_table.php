<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePnrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pnrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pnr_id')->unique();
            $table->string('contact_person');
            $table->string('contact_email');
            $table->string('contact_phone');
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
        Schema::dropIfExists('pnrs');
    }
}
