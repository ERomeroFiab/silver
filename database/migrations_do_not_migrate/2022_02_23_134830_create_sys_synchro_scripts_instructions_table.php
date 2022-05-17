<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSynchroScriptsInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_synchro_scripts_instructions', function (Blueprint $table) {
            $table->double('ID_SYS_SYNCHRO_SCRIPTS_INSTRUCTIONS')->default(0)->primary();
            $table->string('PID_SYS_SYNCHRO_SCRIPTS_NAMES', 32)->default('')->index('PID_SYS_SYNCHRO_SCRIPTS_NAMES');
            $table->string('SYS_CHAMPS_PRIORITAIRES_POSTE', 1024)->default('');
            $table->string('SYS_CHAMPS_PRIORITAIRES_SERVEUR', 1024)->default('');
            $table->string('SYS_LISTE_TABLES_EXCLUES', 1024)->default('');
            $table->double('SYS_MODE_ECHANGE')->default(0);
            $table->string('SYS_NOM_TABLE', 1024)->default('');
            $table->string('SYS_NOM_TABLE_PARTIEL', 1024)->default('');
            $table->string('SYS_REQUETE_EXTRACTION_FROM', 1024)->default('');
            $table->string('SYS_REQUETE_EXTRACTION_WHERE', 1024)->default('');
            $table->double('SYS_TAILLE_PAQUET_HTTP_EXTRACTION_POSTE')->default(0);
            $table->double('SYS_TAILLE_PAQUET_HTTP_EXTRACTION_SERVEUR')->default(0);
            $table->double('SYS_TAILLE_PAQUET_HTTP_INTEGRATION_POSTE')->default(0);
            $table->double('SYS_TAILLE_PAQUET_HTTP_INTEGRATION_SERVEUR')->default(0);
            $table->double('SYS_TYPE_SYNCHRO')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_synchro_scripts_instructions');
    }
}
