<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesColumnsToPackageActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_activities', function (Blueprint $table) {
            $table->float('solo_price')->default(0);
            $table->float('Limo_price')->default(0);
            $table->float('HiAC_price')->default(0);
            $table->float('Caster_price')->default(0);
            $table->float('bus_price')->default(0);
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
            $table->dropColumn([
                'solo_price','Limo_price','HiAC_price','Caster_price','bus_price'
            ]);
        });
    }
}
