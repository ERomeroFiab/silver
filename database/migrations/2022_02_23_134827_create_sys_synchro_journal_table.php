<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSynchroJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_synchro_journal', function (Blueprint $table) {
            $table->string('ID_SYS_SYNCHRO_JOURNAL', 32)->default('')->primary();
            $table->string('SYS_CODE_POSTE', 20)->default('')->index('SYS_CODE_POSTE');
            $table->dateTime('SYS_DATE_SYNCHRO')->nullable()->index('SYS_DATE_SYNCHRO');
            $table->longblob('SYS_FICHIER_CONTENU');
            $table->dateTime('SYS_FICHIER_DATE')->nullable()->index('SYS_FICHIER_DATE');
            $table->string('SYS_FICHIER_NOM', 100)->default('')->index('SYS_FICHIER_NOM');
            $table->double('SYS_FICHIER_TAILLE')->default(0);
            $table->string('SYS_FICHIER_TYPE', 50)->default('');
            $table->string('SYS_NOM_SCRIPT', 50)->default('')->index('SYS_NOM_SCRIPT');
            $table->string('SYS_STATUT', 200)->default('')->index('SYS_STATUT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_synchro_journal');
    }
}
