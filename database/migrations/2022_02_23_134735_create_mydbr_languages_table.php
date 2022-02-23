<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_languages', function (Blueprint $table) {
            $table->char('lang_locale', 5)->primary();
            $table->string('language', 30)->nullable();
            $table->string('date_format', 10)->nullable();
            $table->string('time_format', 10)->nullable();
            $table->string('thousand_separator', 2)->nullable();
            $table->string('decimal_separator', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_languages');
    }
}
