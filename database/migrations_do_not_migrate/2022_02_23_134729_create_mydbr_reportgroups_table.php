<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrReportgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_reportgroups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 128);
            $table->integer('sortorder');
            $table->char('color', 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_reportgroups');
    }
}
