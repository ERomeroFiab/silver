<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->string('CIVILITE', 12)->default('');
            $table->date('DATE_FIN')->nullable()->index('DATE_FIN');
            $table->char('ENVOI_DIRECT', 1)->default('');
            $table->char('ENVOYE', 1)->default('')->index('ENVOYE');
            $table->string('IDENTIFIANT_MESSAGE', 20)->default('')->index('IDENTIFIANT_MESSAGE');
            $table->string('ID_SMS', 32)->default('')->primary();
            $table->binary('MESSAGE');
            $table->string('NOM', 36)->default('');
            $table->string('NO_PORTABLE', 50)->default('');
            $table->string('ORIGINE', 20)->default('')->index('ORIGINE');
            $table->string('PID_ACTION', 32)->default('')->index('PID_ACTION');
            $table->string('PID_AFFAIRE', 32)->default('')->index('PID_AFFAIRE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_LOT', 32)->default('')->index('PID_LOT');
            $table->string('PID_OFFRE_ENTETE', 32)->default('')->index('PID_OFFRE_ENTETE');
            $table->string('PID_RECLAMATION', 32)->default('')->index('PID_RECLAMATION');
            $table->string('PRENOM', 36)->default('');
            $table->string('REFERENCE', 20)->default('');
            $table->string('SENS', 1)->default('')->index('SENS');
            $table->string('SMS_COPIEA', 100)->default('');
            $table->string('SMS_COPIEC', 100)->default('');
            $table->string('STATUT', 20)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->string('SUJET', 100)->default('');
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
        Schema::dropIfExists('sms');
    }
}
