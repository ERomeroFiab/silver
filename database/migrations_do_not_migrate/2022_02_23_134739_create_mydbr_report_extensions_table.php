<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrReportExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_report_extensions', function (Blueprint $table) {
            $table->string('proc_name', 100);
            $table->string('extension', 100);
            
            $table->primary(['proc_name', 'extension']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_report_extensions');
    }
}
