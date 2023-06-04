<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceAndPriceCurrencyToPnrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pnrs', function (Blueprint $table) {
            $table->float('price');
            $table->string('currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pnrs', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('currency');
        });
    }
}
