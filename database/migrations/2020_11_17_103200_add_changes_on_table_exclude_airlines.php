<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangesOnTableExcludeAirlines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exclude_airlines', function (Blueprint $table) {
            $table->string('country_code')->nullable()->change();
            $table->boolean('exclude_for_net')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exclude_airlines', function (Blueprint $table) {
            $table->dropColumn('exclude_for_net');
        });
    }
}
