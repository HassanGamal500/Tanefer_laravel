<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModelColumnsToChildrenPolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('children_policy', function (Blueprint $table) {
            // $table->string('model_type');
            // $table->unsignedBigInteger('model_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('children_policy', function (Blueprint $table) {
           $table->dropColumn(['model_type','model_id']);
        });
    }
}
