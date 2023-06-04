<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',191);
            $table->string('image',191)->nullable();
            $table->text('overview');
            $table->text('includes');
            $table->text('excludes');
            $table->float('price_per_person');
            $table->integer('duration_digits');
            $table->enum('duration_type',['hour','day','week']);
            $table->enum('activity_type',['sightseeing','camping']);
            $table->unsignedBigInteger('tour_city_id');
            $table->timestamps();

            $table->foreign('tour_city_id')
                ->references('id')->on('tour_cities')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_activities');
    }
}
