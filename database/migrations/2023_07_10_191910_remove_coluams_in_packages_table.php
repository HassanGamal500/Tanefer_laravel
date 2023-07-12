<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColuamsInPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('solo_packageprice');
            $table->dropColumn('Limo_packageprice');
            $table->dropColumn('HiAC_packageprice');
            $table->dropColumn('bus_packageprice');
            $table->dropColumn('children_percentage');
            $table->dropColumn('additional_cost');
            $table->dropColumn('expected_price');
            $table->dropColumn('single_supplement_percentage');
            $table->dropColumn('limo_children_percentage');
            $table->dropColumn('hiac_children_percentage');
            $table->dropColumn('bus_children_percentage');
            $table->dropColumn('caster_children_percentage');

        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
