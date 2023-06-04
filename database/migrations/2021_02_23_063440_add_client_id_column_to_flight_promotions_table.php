<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientIdColumnToFlightPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights_promotions', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights_promotions', function (Blueprint $table) {
            $table->dropForeign('client_id');
            $table->dropColumn('client_id');
        });
    }
}
