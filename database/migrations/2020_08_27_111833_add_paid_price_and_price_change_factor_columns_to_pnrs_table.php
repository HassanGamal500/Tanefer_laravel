<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidPriceAndPriceChangeFactorColumnsToPnrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pnrs', function (Blueprint $table) {
            $table->float('paid_price')->nullable();
            $table->string('price_change_factor')->nullable();
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
            $table->dropColumn([
                'paid_price','price_change_factor'
            ]);
        });
    }
}
