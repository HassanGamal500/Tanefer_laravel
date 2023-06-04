<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPackageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->date('start_date')->nullable()->after('price_per_person');
            $table->text('includes')->nullable()->after('start_date');
            $table->text('excludes')->nullable()->after('includes');
        });

        Schema::table('package_cities', function (Blueprint $table) {
            $table->integer('days_number')->nullable()->after('start');
            $table->string('duration')->nullable()->after('days_number');
        });

        Schema::table('package_city_activities', function (Blueprint $table) {
            $table->integer('day_number')->nullable()->after('package_activity_id');
            $table->integer('day_date')->nullable()->after('day_number');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_tables', function (Blueprint $table) {
            //
        });
    }
}
