<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSingleSupplementPercentageInPackageActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_activities', function (Blueprint $table) {
            $table->float('single_supplement_percentage')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_activities', function (Blueprint $table) {
            $table->dropColumn('single_supplement_percentage');
        });
    }
}
