<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateThirdPartyAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_party_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->text('password');
            $table->string('additional_attr')->nullable();
            $table->string('rest_url')->nullable();
            $table->string('soap_url')->nullable();
            $table->string('third_party_type');
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
        Schema::dropIfExists('third_party_accounts');
    }
}
