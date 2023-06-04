<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTourCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour_cities', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->string('image')->nullable()->after('description');
            $table->string('image_alt')->nullable()->after('image');
            $table->string('image_caption')->nullable()->after('image_alt');
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
            $table->dropColumn(['description','image','image_alt','image_caption']);
        });
    }
}
