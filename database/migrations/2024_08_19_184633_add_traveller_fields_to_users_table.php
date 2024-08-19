<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTravellerFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('passenger_title')->nullable();
            $table->string('passenger_gender')->nullable();
            $table->string('passenger_first_name')->nullable();
            $table->string('passenger_last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('pass_expire_date')->nullable();
            $table->string('pass_num')->nullable();
            $table->string('issue_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('passenger_title');
        $table->dropColumn('passenger_gender');
        $table->dropColumn('passenger_first_name');
        $table->dropColumn('passenger_last_name');
        $table->dropColumn('date_of_birth');
        $table->dropColumn('pass_expire_date');
        $table->dropColumn('pass_num');
        $table->dropColumn('issue_country');
    });
}

}
