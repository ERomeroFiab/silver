<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->string('ADRESSE1', 36)->default('');
            $table->string('ADRESSE2', 36)->default('');
            $table->string('ANNEE_CA', 4)->default('');
            $table->double('CA')->default(0);
            $table->string('CIVILITE', 12)->default('');
            $table->string('CODE_NAF', 6)->default('');
            $table->string('CODE_POSTAL', 9)->default('');
            $table->string('CODE_TVA_INTRA', 13)->default('');
            $table->string('E_MAIL', 80)->default('');
            $table->string('FAX', 25)->default('');
            $table->string('ID_SUSPECTS', 32)->default('')->primary();
            $table->string('INTERET', 20)->default('');
            $table->string('LINKEDIN_URL_PUB', 100)->default('');
            $table->string('NOM', 36)->default('');
            $table->binary('NOTE');
            $table->string('ORIGINE', 20)->default('');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PRENOM', 36)->default('');
            $table->double('SCORING_FINANCIER')->default(0);
            $table->string('SIRET', 14)->default('');
            $table->string('SOCIETE', 36)->default('');
            $table->char('SOUHAIT_CONTACT', 1)->default('');
            $table->string('SUIVI_PAR', 20)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_MAP_ADRESSE_GEOCODEE', 80)->default('')->index('SYS_MAP_ADRESSE_GEOCODEE');
            $table->double('SYS_MAP_LATITUDE')->default(0)->index('SYS_MAP_LATITUDE');
            $table->double('SYS_MAP_LONGITUDE')->default(0)->index('SYS_MAP_LONGITUDE');
            $table->string('SYS_MAP_QUALITE_GEOCODAGE', 15)->default('')->index('SYS_MAP_QUALITE_GEOCODAGE');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TELEPHONE', 25)->default('');
            $table->date('TRANSFERT_STE')->nullable();
            $table->string('VIADEO_URL_PUB', 100)->default('');
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
        Schema::dropIfExists('suspects');
    }
}
