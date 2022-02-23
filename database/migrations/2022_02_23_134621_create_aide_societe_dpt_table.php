<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocieteDptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_dpt', function (Blueprint $table) {
            $table->string('CONTINENT', 25)->default('');
            $table->string('DEPARTEMENT', 32)->default('');
            $table->string('ID_AIDE_SOCIETE_DPT', 32)->default('')->primary();
            $table->string('NUMERO_DEPARTEMENT', 5)->default('')->index('NUMERO_DEPARTEMENT');
            $table->string('PAYS', 43)->default('');
            $table->string('REGION', 32)->default('');
            $table->string('SECTEUR', 36)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aide_societe_dpt');
    }
}
