<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpireAtColumnToAPITokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_p_i_tokens', function (Blueprint $table) {
            $table->timestamp('expire_at')->after('token_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('a_p_i_tokens', function (Blueprint $table) {
            $table->dropColumn('expire_at');
        });
    }
}
