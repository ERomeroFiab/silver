<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSynchroScriptsNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_synchro_scripts_names', function (Blueprint $table) {
            $table->string('ID_SYS_SYNCHRO_SCRIPTS_NAMES', 32)->default('')->primary();
            $table->string('SYS_DESCRIPTIF_SCRIPT', 250)->default('');
            $table->string('SYS_HEURES_INDISPONIBILITE', 60)->default('');
            $table->string('SYS_NOM_SCRIPT', 50)->default('')->index('SYS_NOM_SCRIPT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_synchro_scripts_names');
    }
}
