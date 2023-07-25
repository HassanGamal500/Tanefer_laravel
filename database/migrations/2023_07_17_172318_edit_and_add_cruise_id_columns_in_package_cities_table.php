<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAndAddCruiseIdColumnsInPackageCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_cities', function (Blueprint $table) {
            $table->unsignedBigInteger('cruise_id')->index()->nullable();
            $table->foreign('cruise_id')->on('cruises')->references('id')->onDelete('cascade');
            $table->dropColumn('city_or_cruise_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_cities', function (Blueprint $table) {
            //
        });
    }
}
