<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrUiCategoryCollapseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_ui_category_collapse', function (Blueprint $table) {
            $table->string('username', 128);
            $table->integer('authentication');
            $table->integer('mother_id');
            $table->integer('reportgroup');
            
            $table->primary(['username', 'authentication', 'mother_id', 'reportgroup']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_ui_category_collapse');
    }
}
