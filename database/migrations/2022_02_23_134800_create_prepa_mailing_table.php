<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrepaMailingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prepa_mailing', function (Blueprint $table) {
            $table->string('ADRESSE1', 36)->default('');
            $table->string('ADRESSE2', 36)->default('');
            $table->string('ADRESSE3', 36)->default('');
            $table->char('ADRESSE_SPECIFIQUE', 1)->default('');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CODE_POSTAL', 9)->default('');
            $table->string('COMPL_RAISON_SOC', 36)->default('');
            $table->string('EMAIL_CONTACT', 50)->default('');
            $table->string('EMAIL_SOCIETE', 60)->default('');
            $table->string('FICHIER_ORIGINE', 30)->default('');
            $table->string('FONCTION', 32)->default('');
            $table->string('ID_PREPA_MAILING', 32)->default('')->primary();
            $table->binary('MEMO');
            $table->string('NOM', 36)->default('');
            $table->string('NO_LOT', 13)->default('')->index('NO_LOT');
            $table->string('PAYS', 40)->default('');
            $table->string('PID_CAMPAGNE', 32)->default('')->index('PID_CAMPAGNE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_LOT', 32)->default('')->index('PID_LOT');
            $table->string('PID_SUSPECTS', 32)->default('')->index('PID_SUSPECTS');
            $table->string('PRENOM', 36)->default('');
            $table->string('RAISON_SOC', 36)->default('');
            $table->string('SERVICE', 20)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TELEPHONE_DIRECT', 20)->default('');
            $table->string('TELEPHONE_MOBILE', 20)->default('');
            $table->string('TELEPHONE_SOCIETE', 20)->default('');
            $table->string('TYPE_ERREUR', 50)->default('')->index('TYPE_ERREUR');
            $table->string('TYPE_FICHE', 20)->default('');
            $table->string('TYPE_LOT', 15)->default('')->index('TYPE_LOT');
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
        Schema::dropIfExists('prepa_mailing');
    }
}
