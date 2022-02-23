<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_folders', function (Blueprint $table) {
            $table->integer('folder_id')->primary();
            $table->integer('mother_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->tinyInteger('invisible')->nullable();
            $table->integer('reportgroup')->default(1);
            $table->string('explanation', 4096)->nullable();
            $table->string('icon')->nullable();
            
            $table->foreign('reportgroup', 'mydbr_folders_ibfk_1')->references('id')->on('mydbr_reportgroups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_folders');
    }
}
