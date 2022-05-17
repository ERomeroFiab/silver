<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAideSocietePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aide_societe_pays', function (Blueprint $table) {
            $table->string('CODE_ISO', 5)->default('')->index('CODE_ISO');
            $table->string('CONTINENT', 25)->default('');
            $table->string('ID_AIDE_SOCIETE_PAYS', 32)->default('')->primary();
            $table->string('INDICATIF_TEL', 10)->default('');
            $table->string('INTERNATIONAL_POTENTIAL_EMAIL', 200)->default('');
            $table->double('LATITUDE')->default(0);
            $table->double('LONGITUDE')->default(0);
            $table->string('NOM_PAYS', 43)->default('')->index('NOM_PAYS');
            $table->string('NOM_PAYS_MAJ', 43)->default('')->index('NOM_PAYS_MAJ');
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
        Schema::dropIfExists('aide_societe_pays');
    }
}
