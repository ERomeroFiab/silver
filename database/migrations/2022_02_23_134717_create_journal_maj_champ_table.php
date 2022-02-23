<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalMajChampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_maj_champ', function (Blueprint $table) {
            $table->string('ANCIENNE_VALEUR', 50)->default('');
            $table->string('CLE_ENREGISTREMENT', 32)->default('');
            $table->string('ID_JOURNAL_MAJ_CHAMP', 32)->default('')->primary();
            $table->string('INFORMATIONS', 75)->default('');
            $table->string('NOM_CHAMP', 50)->default('');
            $table->string('NOUVELLE_VALEUR', 50)->default('');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_maj_champ');
    }
}
