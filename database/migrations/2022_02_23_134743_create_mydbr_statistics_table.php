<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_statistics', function (Blueprint $table) {
            $table->string('proc_name', 100);
            $table->string('username', 128)->nullable();
            $table->integer('authentication');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->longText('query')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent_hash', 50)->nullable();
            $table->integer('id')->primary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_statistics');
    }
}
