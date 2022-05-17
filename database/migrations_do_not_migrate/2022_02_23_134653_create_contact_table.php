<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->string('ADRESSE1', 36)->default('');
            $table->string('ADRESSE2', 36)->default('');
            $table->string('ADRESSE3', 36)->default('');
            $table->char('ADRESSE_SPECIFIQUE', 1)->default('');
            $table->string('BITRIX_COMPANY', 130)->default('');
            $table->string('BITRIX_KEY', 6)->default('')->index('BITRIX_KEY');
            $table->char('CFO_EVENT', 1)->default('');
            $table->string('CIVILITE', 30)->default('');
            $table->string('CODE_MAILING', 80)->default('');
            $table->string('CODE_POSTAL', 9)->default('');
            $table->char('CONTACT_PRINCIPAL', 1)->default('')->index('CONTACT_PRINCIPAL');
            $table->char('CONTACT_PRINCIPAL_PROD', 1)->default('');
            $table->char('DECIDEUR', 1)->default('');
            $table->char('DESTINATAIRE_MAILING', 1)->default('');
            $table->string('E_MAIL', 50)->default('');
            $table->char('FACTURATION', 1)->default('');
            $table->string('FAX_DIRECT', 20)->default('');
            $table->string('FIABILIS_CONTACT', 10)->default('');
            $table->string('FONCTION', 40)->default('');
            $table->string('FONCTION_CV', 100)->default('');
            $table->char('HR_EVENT', 1)->default('');
            $table->string('ID_CONTACT', 32)->default('')->primary();
            $table->string('IMPOSSIBLE_A_JOINDRE', 10)->default('');
            $table->char('INACTIVE', 1)->default('');
            $table->char('INTERNATIONAL_DECISION_MAKER', 1)->default('');
            $table->char('JURISTE', 1)->default('');
            $table->string('LANGUAGE', 30)->default('');
            $table->string('LINKEDIN_URL_PUB', 100)->default('');
            $table->char('MAIL_REJETE', 1)->default('')->index('MAIL_REJETE');
            $table->char('NE_PAS_CONTACTER_PHONING', 1)->default('');
            $table->char('NE_PAS_ENVOYER_MAIL', 1)->default('');
            $table->char('NE_PAS_ENVOYER_SMS', 1)->default('');
            $table->string('NOM', 80)->default('');
            $table->binary('NOTE');
            $table->char('OK_SYNCHRO_EXCHANGE', 1)->default('')->index('OK_SYNCHRO_EXCHANGE');
            $table->char('OPERATIONNEL', 1)->default('');
            $table->string('OTHER_LANGUAGE_SPOKEN', 40)->default('');
            $table->string('PAYS', 43)->default('');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PRENOM', 36)->default('');
            $table->char('PRESCRIPTEUR', 1)->default('');
            $table->string('RAISON_SOCIALE', 36)->default('');
            $table->string('SERVICE', 40)->default('');
            $table->char('SIGNATAIRE', 1)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->dateTime('SYS_DATE_EXCHANGE')->nullable()->index('SYS_DATE_EXCHANGE');
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_ID_EXCHANGE', 300)->default('')->index('SYS_ID_EXCHANGE');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TARGET', 50)->default('');
            $table->string('TELEPHONE_DIRECT', 20)->default('');
            $table->string('TELEPHONE_MOBILE', 20)->default('');
            $table->string('TEMPO_VP', 100)->default('');
            $table->string('VIADEO_URL_PUB', 100)->default('');
            $table->string('VILLE', 45)->default('');
            $table->string('VP_N_CONTACT', 32)->default('')->index('VP_N_CONTACT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
