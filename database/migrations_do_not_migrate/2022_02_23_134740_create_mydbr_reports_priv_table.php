<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrReportsPrivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_reports_priv', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('report_id');
            $table->string('username', 128)->nullable();
            $table->integer('group_id');
            $table->integer('authentication');
            $table->integer('organization_id')->nullable();
            
            $table->unique(['report_id', 'username', 'group_id', 'authentication', 'organization_id'], 'mydbr_reports_priv_ind');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_reports_priv');
    }
}
