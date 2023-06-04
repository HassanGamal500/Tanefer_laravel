<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdPartyAccountsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_third_party_account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('third_party_account_id');
            $table->unsignedBigInteger('client_id');

            $table->foreign('third_party_account_id')->on('third_party_accounts')->references('id')
                ->onDelete('cascade');

            $table->foreign('client_id')->on('clients')->references('id')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_third_party_account');
    }
}
