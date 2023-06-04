<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChildrenPercentageColumnsInPackageActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_activities', function (Blueprint $table) {
            $table->integer('limo_children_percentage')->default(0);
            $table->integer('hiac_children_percentage')->default(0);
            $table->integer('caster_children_percentage')->default(0);
            $table->integer('bus_children_percentage')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_Activities', function (Blueprint $table) {
            $table->dropColumn([
                'limo_children_percentage','hiac_children_percentage',
                'caster_children_percentage' , 'bus_children_percentage'
            ]);
        });
    }
}
