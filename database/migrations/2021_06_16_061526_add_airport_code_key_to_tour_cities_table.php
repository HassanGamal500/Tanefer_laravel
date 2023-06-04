<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAirportCodeKeyToTourCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour_cities', function (Blueprint $table) {
            $table->string('airport_code')->index()->after('countryName')->nullable();
            $table->foreign('airport_code')->on('airports')
            ->references('code')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_cities', function (Blueprint $table) {
            $table->dropForeign('airport_code');
            $table->dropColumn('airport_code');
        });
    }
}
