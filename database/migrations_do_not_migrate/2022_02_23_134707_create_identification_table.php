<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identification', function (Blueprint $table) {
            $table->string('ACTIVITE', 150)->default('');
            $table->string('ACTIVITY_INAIL_CLASSIFICATION', 20)->default('');
            $table->string('ACTIVITY_INPS_CLASSIFICATION', 20)->default('');
            $table->string('ADRESSE1', 38)->default('');
            $table->string('ADRESSE2', 38)->default('');
            $table->string('ADRESSE3', 38)->default('');
            $table->string('AT_AO_BROKER', 30)->default('');
            $table->date('AT_AO_CONTRACT_ENDING_DATE')->nullable();
            $table->date('AT_AO_CONTRACT_STARTING_DATE')->nullable();
            $table->string('AT_AO_INSURANCE', 30)->default('');
            $table->string('AT_AO_POLICE_NBRE', 20)->default('');
            $table->string('AUDITEUR', 20)->default('');
            $table->char('BELSPO', 1)->default('');
            $table->char('BENEFITS', 1)->default('');
            $table->string('BITRIX_KEY', 6)->default('');
            $table->double('CA')->default(0);
            $table->double('CA_2')->default(0);
            $table->string('CA_2_ANNEE', 4)->default('');
            $table->string('CA_ANNEE', 4)->default('');
            $table->string('CCNL_MAIN', 190)->default('');
            $table->string('CCNL_SECONDARY', 190)->default('');
            $table->char('CLIENT_SECURE', 1)->default('');
            $table->string('CODE_CLIENT', 17)->default('')->index('CODE_CLIENT');
            $table->string('CODE_NAF', 10)->default('');
            $table->string('CODE_NAF2', 10)->default('');
            $table->string('CODE_POSTAL', 9)->default('')->index('CODE_POSTAL');
            $table->string('CODE_TVA_INTRA', 13)->default('');
            $table->string('COMPANY_CLASSIFICATION', 20)->default('');
            $table->string('COMPL_RAISON_SOC', 100)->default('');
            $table->string('CONVENTION_COLLECTIVE_IDCC', 5)->default('');
            $table->string('CONVENTION_COLLECTIVE_TITRE', 300)->default('');
            $table->string('CREATION_DATE', 4)->default('');
            $table->string('CSC_CODE_INPS_CLASSIFICATION', 50)->default('');
            $table->char('CSP_ETRANGER', 1)->default('');
            $table->char('CSP_FRANCE', 1)->default('');
            $table->string('CUSTOMER_RELATIONSHIP_MANAGER', 20)->default('')->index('CUSTOMER_RELATIONSHIP_MANAGER');
            $table->char('DIGITAL_INVOICE_ONLY', 1)->default('');
            $table->char('DIGITAL_INVOICE_REFUSED', 1)->default('');
            $table->char('DMFA_REQUEST', 1)->default('');
            $table->string('EFFECTIF', 50)->default('');
            $table->string('EFFECTIF_2', 50)->default('');
            $table->double('EFFECTIF_NUM')->default(0);
            $table->double('EFFECTIF_NUM_2')->default(0);
            $table->string('EMAIL', 60)->default('');
            $table->char('EMPLOYEES_USE_CARS', 1)->default('');
            $table->string('EPISODES_OF_INTEGRATION_OR_SOLIDARITY', 3)->default('');
            $table->string('EPISODES_OF_INTEGRATION_OR_SOLIDARITY_YEAR', 4)->default('');
            $table->string('FAX', 50)->default('');
            $table->string('FISCAL_CLOSING', 25)->default('');
            $table->string('FORME_JURIDIQUE', 120)->default('');
            $table->char('FUSION', 1)->default('');
            $table->string('GROUP', 200)->default('');
            $table->char('HEAD_OFFICE', 1)->default('')->index('HEAD_OFFICE');
            $table->string('HEAD_OFFICE_NAME', 200)->default('');
            $table->string('ID_IDENTIFICATION', 32)->default('')->primary();
            $table->char('INCORPORATION', 1)->default('');
            $table->char('INTERNATIONAL', 1)->default('');
            $table->char('INTERNATIONAL_COMPANY', 1)->default('');
            $table->string('INTERNATIONAL_GROUP', 200)->default('');
            $table->char('INTERNATIONAL_HEAD_OFFICE', 1)->default('');
            $table->string('INTERNATIONAL_HEAD_OFFICE_TYPE', 25)->default('');
            $table->string('INTERNATIONAL_RESPONSIBLE', 20)->default('');
            $table->string('INTERNATIONAL_SECTOR', 40)->default('');
            $table->string('INVOICE_LANGUAGE', 10)->default('');
            $table->char('IP_BELGIUM', 1)->default('');
            $table->char('IP_BRAZIL', 1)->default('');
            $table->char('IP_CHILE', 1)->default('');
            $table->string('IP_COUNTRY_OF_THE_DECISION_MAKER', 60)->default('');
            $table->char('IP_FRANCE', 1)->default('');
            $table->char('IP_GERMANY', 1)->default('');
            $table->char('IP_ITALY', 1)->default('');
            $table->char('IP_POLAND', 1)->default('');
            $table->char('IP_SPAIN', 1)->default('');
            $table->char('IWT', 1)->default('');
            $table->char('KEY_ACCOUNT', 1)->default('');
            $table->char('LIQUIDATION', 1)->default('');
            $table->char('LISTED_COMPANY', 1)->default('');
            $table->string('MAPS_ADRESSE', 80)->default('');
            $table->char('MAPS_ADRESSE_PHYSIQUE', 1)->default('');
            $table->string('MAPS_CODE_POSTAL', 9)->default('');
            $table->string('MAPS_PAYS', 43)->default('');
            $table->string('MAPS_VILLE', 45)->default('');
            $table->double('NB_ETABLISSEMENTS')->default(0);
            $table->double('NET_PROFIT')->default(0);
            $table->string('NOM_EXPEDITEUR', 20)->default('');
            $table->double('NUMBER_MANAGERS')->default(0);
            $table->string('N_CANAL_SFTP', 6)->default('');
            $table->string('ONSS_PROTOCOL', 10)->default('');
            $table->string('ONSS_TYPE_OF_COMPANY', 10)->default('');
            $table->string('ORIGINE', 60)->default('');
            $table->string('OT24', 10)->default('');
            $table->string('OT24_YEAR', 4)->default('');
            $table->string('PARTICULAR_SITUATIONS_INPS_INAIL', 3)->default('');
            $table->string('PARTICULAR_SITUATIONS_INPS_INAIL_DETAIL', 100)->default('');
            $table->string('PAYROLL_MANAGEMENT', 10)->default('');
            $table->string('PAYROLL_OUTSOURCER', 50)->default('');
            $table->string('PAYROLL_SOFTWARE', 50)->default('');
            $table->string('PAYS', 43)->default('');
            $table->string('PERS_MORALE_OU_PERS_PHYSIQUE', 20)->default('')->index('PERS_MORALE_OU_PERS_PHYSIQUE');
            $table->string('PID_GROUP', 32)->default('')->index('PID_GROUP');
            $table->string('PID_INTERNATIONAL_GROUP', 32)->default('')->index('PID_INTERNATIONAL_GROUP');
            $table->string('PID_PARTNER', 32)->default('')->index('PID_PARTNER');
            $table->string('PID_REVENDEUR', 32)->default('')->index('PID_REVENDEUR');
            $table->string('PID_SUSPECTS', 32)->default('')->index('PID_SUSPECTS');
            $table->char('PO_MANDATORY', 1)->default('');
            $table->string('RAISON_SOC', 200)->default('')->index('RAISON_SOC');
            $table->string('REAL_ECONOMIC_ACTIVITY', 100)->default('');
            $table->string('RECO_GROUP', 3)->default('');
            $table->string('REVENDEUR', 36)->default('');
            $table->string('SAVING_ACTIONS', 150)->default('');
            $table->string('SAVING_ACTIONS_OTHERS', 100)->default('');
            $table->double('SCORING_FINANCIER')->default(0);
            $table->double('SCORING_IT_1')->default(0);
            $table->double('SCORING_IT_2')->default(0);
            $table->double('SCORING_IT_3')->default(0);
            $table->double('SCORING_IT_4')->default(0);
            $table->double('SCORING_IT_5')->default(0);
            $table->double('SCORING_IT_6')->default(0);
            $table->double('SCORING_IT_7')->default(0);
            $table->double('SCORING_IT_8')->default(0);
            $table->double('SCORING_IT_9')->default(0);
            $table->double('SCORING_TOTAL')->default(0);
            $table->string('SECOND_LEVEL_CONTRACTS', 3)->default('');
            $table->string('SECRETARIAT_SOCIAL_ADRESSE', 100)->default('');
            $table->string('SECRETARIAT_SOCIAL_EMAIL', 50)->default('');
            $table->string('SECRETARIAT_SOCIAL_GESTIONNAIRE', 50)->default('');
            $table->string('SECRETARIAT_SOCIAL_NOM', 35)->default('');
            $table->string('SECRETARIAT_SOCIAL_TEL', 20)->default('');
            $table->string('SECTEUR_GEO', 15)->default('');
            $table->string('SEGMENT', 35)->default('');
            $table->string('SIRET', 14)->default('')->index('SIRET');
            $table->string('SIRET2', 14)->default('')->index('SIRET2');
            $table->string('SIRET3', 10)->default('');
            $table->string('SITE_WEB', 100)->default('');
            $table->string('SITUATION_JURIDIQUE', 70)->default('')->index('SITUATION_JURIDIQUE');
            $table->date('SITUATION_JURIDIQUE_DATE')->nullable();
            $table->string('SOCIAL_CAPITAL', 20)->default('');
            $table->string('SPI_CERTIFICADO', 25)->default('');
            $table->char('SPI_SUBVENCIONES', 1)->default('');
            $table->char('SPLIT', 1)->default('');
            $table->string('SUB_SECTOR', 15)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->char('SUIVI_PAR_MANUEL', 1)->default('');
            $table->string('SUIVI_PAR_REAFF', 20)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_MAP_ADRESSE_GEOCODEE', 80)->default('');
            $table->double('SYS_MAP_LATITUDE')->default(0);
            $table->double('SYS_MAP_LONGITUDE')->default(0);
            $table->string('SYS_MAP_QUALITE_GEOCODAGE', 15)->default('');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->char('TARGET_AT', 1)->default('');
            $table->char('TARGET_JIB', 1)->default('');
            $table->char('TARGET_ONSS', 1)->default('');
            $table->char('TARGET_PRP', 1)->default('');
            $table->char('TARGET_PRP_CHANTIER', 1)->default('');
            $table->char('TARGET_SOCIAL', 1)->default('');
            $table->string('TELEPHONE', 50)->default('');
            $table->decimal('TGG_2017', 6, 2)->default(0.00);
            $table->decimal('TGG_2019', 6, 2)->default(0.00);
            $table->char('TOP_TARGET_AT', 1)->default('');
            $table->char('TOP_TARGET_PRP', 1)->default('');
            $table->char('TO_DELETE', 1)->default('');
            $table->string('TRANCHE_CA', 50)->default('');
            $table->string('TRANCHE_CA_2', 50)->default('');
            $table->char('TRANSFER_ABROAD', 1)->default('');
            $table->char('TRANSFER_ITALIA', 1)->default('');
            $table->string('TYPE_FICHE', 25)->default('');
            $table->date('URSSAF')->nullable();
            $table->string('URSSAF_MDP_NET_ENTREPRISE', 30)->default('');
            $table->string('URSSAF_NO_COTISANT1', 3)->default('');
            $table->string('URSSAF_NO_COTISANT2', 15)->default('');
            $table->string('URSSAF_RATTACHEMENT', 50)->default('');
            $table->char('URSSAF_VLU', 1)->default('');
            $table->string('VILLE', 60)->default('');
            $table->string('VOCE_TARIFFA_NOT_0722_0723', 3)->default('');
            $table->string('VP_N_SOCIETE', 32)->default('')->index('VP_N_SOCIETE');
            $table->string('WORKFORCE_2_YEAR', 4)->default('');
            $table->string('WORKFORCE_YEAR', 4)->default('');
            $table->date('PARTNER_UPDATE_DATE')->nullable();
            $table->char('SINE', 1)->default('');
            $table->char('TOP_TARGET_INNO', 1)->default('');
            $table->char('TOP_TARGET_ONSS', 1)->default('');
            $table->double('UNIVERSITY_GRADUATES')->default(0);
            $table->double('WORKERS_BLUE_COLLAR')->default(0);
            $table->string('PAYROLL_OUTSOURCER_TYPE', 50)->default('');
            $table->decimal('TGG_2019_B', 6, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identification');
    }
}
