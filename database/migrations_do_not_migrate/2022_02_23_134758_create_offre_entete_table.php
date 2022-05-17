<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffreEnteteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offre_entete', function (Blueprint $table) {
            $table->string('ADRESSE_1', 36)->default('');
            $table->string('ADRESSE_2', 36)->default('');
            $table->string('ADRESSE_3', 36)->default('');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CODE_POSTAL', 9)->default('');
            $table->string('COMPL_RAISON_SOCIALE', 50)->default('');
            $table->string('CONDITIONS_PAIEMENT', 50)->default('');
            $table->date('DATE_EMISSION')->nullable();
            $table->date('DATE_SIGNATURE')->nullable();
            $table->date('DATE_VALIDITE')->nullable();
            $table->string('EMAIL_DEST', 100)->default('');
            $table->string('ETAT', 10)->default('');
            $table->string('ID_OFFRE_ENTETE', 32)->default('')->primary();
            $table->binary('MEMO');
            $table->string('NOM', 36)->default('');
            $table->string('NO_AFFAIRE', 20)->default('');
            $table->string('NO_PIECE', 20)->default('')->index('NO_PIECE');
            $table->string('PAYS', 43)->default('');
            $table->string('PID_ADRESSE', 32)->default('')->index('PID_ADRESSE');
            $table->string('PID_AFFAIRE', 32)->default('')->index('PID_AFFAIRE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PRENOM', 36)->default('');
            $table->string('RAISON_SOCIALE', 36)->default('');
            $table->double('REMISE_DEFAUT')->default(0);
            $table->longblob('SIGNATURE');
            $table->date('SIGNEE_LE')->nullable()->index('SIGNEE_LE');
            $table->string('SIGNEE_PAR', 30)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('TAUX_TVA')->default(0);
            $table->string('TITRE', 80)->default('');
            $table->string('TYPE', 10)->default('');
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
        Schema::dropIfExists('offre_entete');
    }
}
