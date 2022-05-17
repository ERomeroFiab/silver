<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMydbrFoldersPrivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mydbr_folders_priv', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('folder_id');
            $table->string('username', 128);
            $table->integer('group_id');
            $table->integer('authentication');
            $table->integer('organization_id')->nullable();
            
            $table->unique(['folder_id', 'username', 'group_id', 'authentication', 'organization_id'], 'folder_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mydbr_folders_priv');
    }
}
