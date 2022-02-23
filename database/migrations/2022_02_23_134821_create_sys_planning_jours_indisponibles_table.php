<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysPlanningJoursIndisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_planning_jours_indisponibles', function (Blueprint $table) {
            $table->string('ID_SYS_PLANNING_JOURS_INDISPONIBLES', 32)->default('')->primary();
            $table->string('SYS_CODES_RESSOURCES_AUTORISES', 100)->default('');
            $table->string('SYS_CODES_RESSOURCES_EXCLUS', 100)->default('');
            $table->double('SYS_CODE_JOUR')->default(0);
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->string('SYS_DATE_DEBUT', 10)->default('');
            $table->string('SYS_DATE_FIN', 10)->default('');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_NOM_PERIODE_AFFICHEE', 50)->default('');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->double('SYS_TYPE_PERIODE')->default(0);
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
        Schema::dropIfExists('sys_planning_jours_indisponibles');
    }
}
