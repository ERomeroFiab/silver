<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchantillonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echantillon', function (Blueprint $table) {
            $table->string('ADRESSE_1', 38)->default('');
            $table->string('ADRESSE_2', 38)->default('');
            $table->char('ADRESSE_SPECIFIQUE', 1)->default('');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CODE_POSTAL', 10)->default('');
            $table->binary('COMMENTAIRE');
            $table->date('DATE_DEMANDE')->nullable();
            $table->date('DATE_LIVRAISON')->nullable();
            $table->string('EMETTEUR', 25)->default('')->index('EMETTEUR');
            $table->string('ID_ECHANTILLON', 32)->default('')->primary();
            $table->string('NOM', 36)->default('');
            $table->string('NUM_ECHANTILLON', 18)->default('')->index('NUM_ECHANTILLON');
            $table->string('PAYS', 43)->default('');
            $table->char('PHOTO', 1)->default('');
            $table->string('PID_CONTACT', 32)->default('');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PRENOM', 36)->default('');
            $table->string('RAISON', 20)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('VALORISATION')->default(0);
            $table->string('VILLE', 35)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echantillon');
    }
}
