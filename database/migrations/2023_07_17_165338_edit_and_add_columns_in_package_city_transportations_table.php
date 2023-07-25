<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAndAddColumnsInPackageCityTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_city_transportations', function (Blueprint $table) {
            $table->dropColumn('destination_city_id');
            $table->unsignedBigInteger('package_id')->after('package_city_id');
            $table->foreign('package_id')->nullable()->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_city_transportations', function (Blueprint $table) {
            //
        });
    }
}
