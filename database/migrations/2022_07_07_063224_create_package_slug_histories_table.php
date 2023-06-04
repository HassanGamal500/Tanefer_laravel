<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageSlugHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_slug_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->unsignedBigInteger('package_id')->index();
            $table->foreign('package_id')->on('packages')->references('id')
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
        Schema::dropIfExists('package_slug_histories');
    }
}
