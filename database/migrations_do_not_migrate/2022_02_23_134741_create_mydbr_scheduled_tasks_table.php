<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrScheduledTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_scheduled_tasks', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('description', 2028)->nullable();
            $table->string('url', 2028)->nullable();
            $table->string('timing');
            $table->dateTime('last_run')->nullable();
            $table->integer('disabled')->nullable();
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_scheduled_tasks');
    }
}
