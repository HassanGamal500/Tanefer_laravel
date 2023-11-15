<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cruises', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('featured_image')->nullable();
        });
        Schema::table('package_activities', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('featured_image')->nullable();
        });
        Schema::table('packages', function (Blueprint $table) {
            $table->string('featured_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cruises', function (Blueprint $table) {
            //
        });
    }
}
