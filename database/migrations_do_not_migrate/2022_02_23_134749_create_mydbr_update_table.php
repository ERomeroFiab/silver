<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_update', function (Blueprint $table) {
            $table->string('latest_version', 10)->primary();
            $table->integer('next_check')->nullable();
            $table->string('download_link', 200)->nullable();
            $table->string('info_link', 200)->nullable();
            $table->integer('last_successful_check')->nullable();
            $table->string('signature', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_update');
    }
}
