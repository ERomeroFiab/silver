<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_snippets', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 30)->nullable();
            $table->text('code')->nullable();
            $table->string('shortcut', 20)->nullable();
            $table->integer('cright')->nullable();
            $table->integer('cdown')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_snippets');
    }
}
