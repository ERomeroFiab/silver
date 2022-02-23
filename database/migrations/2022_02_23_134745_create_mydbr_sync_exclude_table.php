<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrSyncExcludeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_sync_exclude', function (Blueprint $table) {
            $table->string('username', 128);
            $table->integer('authentication');
            $table->string('proc_name', 100);
            $table->string('type', 20);
            
            $table->primary(['username', 'authentication', 'proc_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_sync_exclude');
    }
}
