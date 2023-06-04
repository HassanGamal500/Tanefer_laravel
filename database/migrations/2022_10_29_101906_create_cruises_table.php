<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCruisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cruise_line')->nullable();
            $table->string('ship_name')->nullable();
            $table->text('facilities')->nullable();
            $table->text('description')->nullable();
            $table->text('policies')->nullable();
            $table->text('excludes')->nullable();
            $table->text('includes')->nullable();
            $table->integer('stars');
            $table->string('master_image');
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
        Schema::dropIfExists('cruises');
    }
}
