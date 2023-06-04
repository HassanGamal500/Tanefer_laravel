<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientAdDColumnToProfitSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profit_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->foreign('client_id')->on('clients')->references('id')
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
        Schema::table('profit_settings', function (Blueprint $table) {
            $table->dropForeign('client_id');
            $table->dropColumn('client_id');
        });
    }
}
