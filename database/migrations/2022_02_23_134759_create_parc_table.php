<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parc', function (Blueprint $table) {
            $table->string('ADRESSE_1', 36)->default('');
            $table->string('ADRESSE_2', 36)->default('');
            $table->string('ADRESSE_3', 36)->default('');
            $table->string('CODE_ARTICLE', 25)->default('');
            $table->string('CODE_POSTAL', 9)->default('');
            $table->string('COMPL_RAISON_SOC', 36)->default('');
            $table->char('CONTRAT_MAINTENANCE', 1)->default('');
            $table->date('DATE_ACHAT')->nullable();
            $table->date('DATE_FIN_CONTRAT')->nullable();
            $table->date('DATE_GARANTIE')->nullable();
            $table->string('DES_ARTICLE', 50)->default('');
            $table->string('ID_PARC', 32)->default('')->primary();
            $table->binary('MEMO');
            $table->string('NO_PARC', 20)->default('')->index('NO_PARC');
            $table->string('NUM_CDE', 18)->default('');
            $table->string('NUM_CONTRAT_MAINT', 18)->default('');
            $table->string('NUM_SERIE', 18)->default('');
            $table->char('PAR_REVENDEUR', 1)->default('');
            $table->string('PAYS', 43)->default('');
            $table->string('PID_ADRESSE', 32)->default('')->index('PID_ADRESSE');
            $table->string('PID_ARTICLE', 32)->default('')->index('PID_ARTICLE');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_REVENDEUR', 32)->default('')->index('PID_REVENDEUR');
            $table->double('QUANTITE')->default(0);
            $table->string('RAISON_SOCIALE', 36)->default('');
            $table->string('RS_REVENDEUR', 36)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_MAP_ADRESSE_GEOCODEE', 80)->default('');
            $table->double('SYS_MAP_LATITUDE')->default(0);
            $table->double('SYS_MAP_LONGITUDE')->default(0);
            $table->string('SYS_MAP_QUALITE_GEOCODAGE', 15)->default('');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TYPE_ADRESSE', 15)->default('');
            $table->string('VILLE', 45)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parc');
    }
}
