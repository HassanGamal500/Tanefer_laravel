<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToThirdPartyAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('third_party_accounts', function (Blueprint $table) {
            $table->text('token')->nullable();
            $table->timestamp('token_expire_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('third_party_accounts', function (Blueprint $table) {
            $table->dropColumn('token_expire_at');
            $table->dropColumn('token');
        });
    }
}
