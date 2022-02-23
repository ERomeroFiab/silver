<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSynchroParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_synchro_parametres', function (Blueprint $table) {
            $table->string('ID_SYS_SYNCHRO_PARAMETRES', 32)->default('')->primary();
            $table->string('SYS_CODE_POSTE', 20)->default('')->index('SYS_CODE_POSTE');
            $table->char('SYS_DESACTIVER_POSTE', 1)->default('');
            $table->string('SYS_DESCRIPTIF_POSTE', 250)->default('');
            $table->char('SYS_DESINSTALLER_POSTE', 1)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_synchro_parametres');
    }
}
