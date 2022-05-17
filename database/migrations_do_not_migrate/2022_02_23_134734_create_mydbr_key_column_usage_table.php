<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrKeyColumnUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_key_column_usage', function (Blueprint $table) {
            $table->string('table_schema', 64);
            $table->string('table_name', 64);
            $table->string('column_name', 64);
            $table->string('referenced_table_schema', 64)->nullable();
            $table->string('referenced_table_name', 64)->nullable();
            $table->string('referenced_column_name', 64)->nullable();
            
            $table->primary(['table_schema', 'table_name', 'column_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_key_column_usage');
    }
}
