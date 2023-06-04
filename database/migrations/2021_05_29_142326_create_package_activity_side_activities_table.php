<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageActivitySideActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_activity_side_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_activity_id');
            $table->string('name',191);
            $table->string('time');
            $table->timestamps();

            $table->foreign('package_activity_id')
                ->references('id')->on('package_activities')
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
        Schema::dropIfExists('package_activity_camping_activities');
    }
}
