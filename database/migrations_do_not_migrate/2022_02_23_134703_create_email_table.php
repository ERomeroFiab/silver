<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email', function (Blueprint $table) {
            $table->string('BITRIX_CONTACT', 150)->default('');
            $table->string('BITRIX_KEY', 6)->default('')->index('BITRIX_KEY');
            $table->string('CIVILITE', 12)->default('');
            $table->dateTime('DATE_HEURE_ENVOI_MAIL')->nullable()->index('DATE_HEURE_ENVOI_MAIL');
            $table->string('EMAIL_COPIEA', 100)->default('');
            $table->string('EMAIL_COPIEC', 100)->default('');
            $table->char('ENVOI_DIRECT', 1)->default('');
            $table->char('ENVOYE', 1)->default('');
            $table->string('E_MAIL', 100)->default('');
            $table->string('ID_EMAIL', 32)->default('')->primary();
            $table->binary('MESSAGE');
            $table->string('NOM', 80)->default('');
            $table->string('ORIGINE', 20)->default('')->index('ORIGINE');
            $table->string('PID_ACTION', 32)->default('')->index('PID_ACTION');
            $table->string('PID_AFFAIRE', 32)->default('')->index('PID_AFFAIRE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_ECHANTILLON', 32)->default('')->index('PID_ECHANTILLON');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_INVOICE', 32)->default('')->index('PID_INVOICE');
            $table->string('PID_LOT', 32)->default('')->index('PID_LOT');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
            $table->string('PID_MISSION_AUDIT_REPORT', 32)->default('')->index('PID_MISSION_AUDIT_REPORT');
            $table->string('PID_OFFRE_ENTETE', 32)->default('')->index('PID_OFFRE_ENTETE');
            $table->string('PID_RECLAMATION', 32)->default('')->index('PID_RECLAMATION');
            $table->string('PID_TICKET', 32)->default('')->index('PID_TICKET');
            $table->string('PRENOM', 36)->default('');
            $table->string('REFERENCE', 20)->default('');
            $table->string('SENS', 1)->default('')->index('SENS');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->string('SUJET', 150)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
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
        Schema::dropIfExists('email');
    }
}
