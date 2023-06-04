<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIncludesExcludesToPackageHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_hotels', function (Blueprint $table) {
            $table->text('includes')->nullable()->after('policies');
            $table->text('excludes')->nullable()->after('policies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_hotels', function (Blueprint $table) {
            //
        });
    }
}
