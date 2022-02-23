<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_licenses', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('owner');
            $table->string('email');
            $table->string('company');
            $table->string('host');
            $table->string('license_key', 80);
            $table->string('db', 10);
            $table->date('expiration');
            $table->string('type')->nullable();
            $table->string('version')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_licenses');
    }
}
