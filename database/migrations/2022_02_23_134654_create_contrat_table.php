<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat', function (Blueprint $table) {
            $table->date('ALERTE_FIN_CONTRAT')->nullable()->index('ALERTE_FIN_CONTRAT');
            $table->char('ALERTE_POSEE', 1)->default('');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CIVILITE_FACTURATION', 12)->default('');
            $table->binary('COMMENTAIRE');
            $table->string('CONTRAT_TYPE', 30)->default('');
            $table->date('DATE_DEBUT_ANALYSE')->nullable();
            $table->date('DATE_DEBUT_CONTRAT')->nullable()->index('DATE_DEBUT_CONTRAT');
            $table->date('DATE_FIN_ANALYSE')->nullable();
            $table->date('DATE_FIN_CONTRAT')->nullable()->index('DATE_FIN_CONTRAT');
            $table->date('DATE_SIGNATURE_CLIENT')->nullable();
            $table->date('DATE_SIGNATURE_INTERNE')->nullable();
            $table->char('DROIT_DE_CITER', 1)->default('');
            $table->double('ENGAGEMENT_MOIS')->default(0);
            $table->string('E_MAIL', 50)->default('');
            $table->string('E_MAIL_FACTURATION', 50)->default('');
            $table->string('FAMILLE', 30)->default('')->index('FAMILLE');
            $table->char('FEE_INCLUDES_VAT', 1)->default('');
            $table->string('FIABILIS_GROUP_ENTITY', 50)->default('');
            $table->string('GROUPE', 20)->default('')->index('GROUPE');
            $table->string('ID_CONTRAT', 32)->default('')->primary();
            $table->string('IT_COMPTEUR', 15)->default('')->index('IT_COMPTEUR');
            $table->string('MODE_SIGNATURE', 15)->default('');
            $table->char('MULTI_COMPANY_INVOICING', 1)->default('');
            $table->char('MULTI_ENTITY', 1)->default('');
            $table->char('MULTI_SALES', 1)->default('');
            $table->string('NOM', 80)->default('');
            $table->string('NOM_FACTURATION', 80)->default('');
            $table->string('NO_CONTRAT', 20)->default('')->index('NO_CONTRAT');
            $table->string('NO_CONTRAT_ORIGINE', 20)->default('');
            $table->string('NO_ENTITY', 2)->default('')->index('NO_ENTITY');
            $table->string('NO_SUFFIXE', 10)->default('');
            $table->string('PID_AIDE_OFFRE_CONDITION', 32)->default('')->index('PID_AIDE_OFFRE_CONDITION');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_CONTACT_FACTURATION', 32)->default('')->index('PID_CONTACT_FACTURATION');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_PARTNER', 32)->default('')->index('PID_PARTNER');
            $table->string('PRENOM', 36)->default('');
            $table->string('PRENOM_FACTURATION', 36)->default('');
            $table->string('RECONDUCTION_TYPE', 20)->default('')->index('RECONDUCTION_TYPE');
            $table->string('STATUT', 20)->default('')->index('STATUT');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TEMPO_VP', 100)->default('')->index('TEMPO_VP');
            $table->double('VALEUR')->default(0);
            $table->string('VP_NO_CONTRAT', 10)->default('')->index('VP_NO_CONTRAT');
            $table->string('INTERNATIONAL_SALES', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat');
    }
}
