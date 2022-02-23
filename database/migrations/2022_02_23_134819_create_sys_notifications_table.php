<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_notifications', function (Blueprint $table) {
            $table->string('ID_SYS_NOTIFICATIONS', 32)->default('')->primary();
            $table->string('SYS_CODE_USER_DESTINATAIRE', 20)->default('')->index('SYS_CODE_USER_DESTINATAIRE');
            $table->string('SYS_CODE_USER_EMETTEUR', 20)->default('')->index('SYS_CODE_USER_EMETTEUR');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->dateTime('SYS_DATE_HEURE_NOTIFICATION')->nullable()->index('SYS_DATE_HEURE_NOTIFICATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_ID_ENREG', 32)->default('')->index('SYS_ID_ENREG');
            $table->string('SYS_MAIL_DIRECT_DESTINATAIRE', 100)->default('');
            $table->binary('SYS_MESSAGE');
            $table->binary('SYS_MESSAGE_SMS');
            $table->string('SYS_NOM_FICHIER_PLA', 60)->default('')->index('SYS_NOM_FICHIER_PLA');
            $table->char('SYS_NOTIFICATION_ECRAN_FAIT_OK', 1)->default('');
            $table->char('SYS_NOTIFICATION_ECRAN_OK', 1)->default('');
            $table->char('SYS_NOTIFICATION_EMAIL_FAIT_OK', 1)->default('');
            $table->char('SYS_NOTIFICATION_EMAIL_OK', 1)->default('');
            $table->char('SYS_NOTIFICATION_SMS_FAIT_OK', 1)->default('');
            $table->char('SYS_NOTIFICATION_SMS_OK', 1)->default('');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_TABLE', 50)->default('')->index('SYS_TABLE');
            $table->string('SYS_TEL_SMS_DIRECT_DESTINATAIRE', 100)->default('');
            $table->string('SYS_TITRE', 300)->default('')->index('SYS_TITRE');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
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
        Schema::dropIfExists('sys_notifications');
    }
}
