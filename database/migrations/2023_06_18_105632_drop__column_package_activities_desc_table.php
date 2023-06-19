<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnPackageActivitiesDescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_activities', function (Blueprint $table) {
            $table->dropColumn('limo_children_percentage');
            $table->dropColumn('hiac_children_percentage');
            $table->dropColumn('caster_children_percentage');
            $table->dropColumn('bus_children_percentage');
            $table->dropColumn('children_percentage');
            $table->dropColumn('single_supplement_percentage');
            $table->dropColumn('solo_price');
            $table->dropColumn('Limo_price');
            $table->dropColumn('HiAC_price');
            $table->dropColumn('Caster_price');
            $table->dropColumn('bus_price');
            $table->dropColumn('end_time');
            $table->dropColumn('pax_min_number');
            $table->dropColumn('price_per_person');
            $table->dropColumn('duration_type');
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
            //
        });
    }
}
