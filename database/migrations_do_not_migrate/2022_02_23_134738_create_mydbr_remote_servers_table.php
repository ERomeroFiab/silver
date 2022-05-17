<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrRemoteServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_remote_servers', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('server', 128);
            $table->string('url');
            $table->string('hash', 40);
            $table->string('username', 128);
            $table->string('password', 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_remote_servers');
    }
}
