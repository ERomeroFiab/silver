<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_templates', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 128);
            $table->text('header')->nullable();
            $table->text('rowdata')->nullable();
            $table->text('footer')->nullable();
            $table->integer('folder_id')->nullable();
            $table->dateTime('creation_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_templates');
    }
}
