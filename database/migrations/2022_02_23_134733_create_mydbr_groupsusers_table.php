<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrGroupsusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_groupsusers', function (Blueprint $table) {
            $table->integer('group_id');
            $table->string('user', 128);
            $table->integer('authentication');
            
            $table->primary(['group_id', 'user', 'authentication']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_groupsusers');
    }
}
