<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191);
            $table->text('address');
            $table->text('facilities');
            $table->text('description');
            $table->text('policies');
            $table->integer('stars');
            $table->string('phone',191);
            $table->string('image',191);
            $table->unsignedBigInteger('tour_city_id');
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
        Schema::dropIfExists('package_hotels');
    }
}
