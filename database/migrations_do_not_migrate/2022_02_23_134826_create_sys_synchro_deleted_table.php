<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSynchroDeletedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_synchro_deleted', function (Blueprint $table) {
            $table->string('SYS_CODE_POSTE', 20)->default('')->index('SYS_CODE_POSTE');
            $table->string('SYS_ID_ENREGISTREMENT', 32)->default('')->index('SYS_ID_ENREGISTREMENT');
            $table->string('SYS_NOM_TABLE', 50)->default('')->index('SYS_NOM_TABLE');
            $table->char('SYS_REAFFECTATION_FICHE_OK', 1)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_synchro_deleted');
    }
}
