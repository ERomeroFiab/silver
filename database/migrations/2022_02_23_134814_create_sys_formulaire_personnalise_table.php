<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysFormulairePersonnaliseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_formulaire_personnalise', function (Blueprint $table) {
            $table->string('ID_SYS_FORMULAIRE_PERSONNALISE', 32)->default('')->primary();
            $table->string('SYS_CODE_UTILISATEUR', 20)->default('')->index('SYS_CODE_UTILISATEUR');
            $table->binary('SYS_COORDONNEES');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_ID_FORMULAIRE', 120)->default('');
            $table->string('SYS_NOM_FICHIER_PLA', 60)->default('')->index('SYS_NOM_FICHIER_PLA');
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
        Schema::dropIfExists('sys_formulaire_personnalise');
    }
}
