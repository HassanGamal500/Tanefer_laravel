<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBookingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_payments', function (Blueprint $table) {
            $table->string('customer_ip')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_status_message')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('authorization_code')->nullable();
            $table->string('payment_response_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_payments', function (Blueprint $table) {
            //
        });
    }
}
