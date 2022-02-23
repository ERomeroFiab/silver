<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->char('ALARME', 1)->default('');
            $table->string('BITRIX_CONTACT', 100)->default('');
            $table->string('BITRIX_KEY', 6)->default('')->index('BITRIX_KEY');
            $table->string('CATEGORIE', 25)->default('')->index('CATEGORIE');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CODE_CAMPAGNE', 50)->default('');
            $table->date('DATE_ALARME')->nullable()->index('DATE_ALARME');
            $table->date('DATE_DEBUT')->nullable()->index('DATE_DEBUT');
            $table->date('DATE_FIN')->nullable()->index('DATE_FIN');
            $table->time('DUREE_CHRONO')->default('00:00:00');
            $table->string('EMPLACEMENT', 100)->default('');
            $table->string('E_MAIL', 50)->default('');
            $table->char('FAIT', 1)->default('')->index('FAIT');
            $table->time('HEURE_ALARME')->default('00:00:00');
            $table->time('HEURE_DEBUT')->default('00:00:00');
            $table->time('HEURE_FIN')->default('00:00:00');
            $table->string('ID_ACTION', 32)->default('')->primary();
            $table->double('NB_MINUTES_AVANT_ALARME')->default(0);
            $table->string('NOM', 80)->default('');
            $table->binary('NOTE');
            $table->string('NO_AFFAIRE', 20)->default('');
            $table->string('NO_CONTRAT', 20)->default('');
            $table->string('NO_LOT', 13)->default('')->index('NO_LOT');
            $table->string('NO_MISSION', 20)->default('');
            $table->string('NO_OFFRE', 20)->default('');
            $table->string('NO_RECLAMATION', 20)->default('');
            $table->string('OBJET', 150)->default('');
            $table->string('ORIGINE_ACTION', 30)->default('');
            $table->string('PID_AFFAIRE', 32)->default('')->index('PID_AFFAIRE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_LOT', 32)->default('')->index('PID_LOT');
            $table->string('PID_MISSION', 32)->default('')->index('PID_MISSION');
            $table->string('PID_OFFRE_ENTETE', 32)->default('')->index('PID_OFFRE_ENTETE');
            $table->string('PID_RECLAMATION', 32)->default('')->index('PID_RECLAMATION');
            $table->string('PRENOM', 36)->default('');
            $table->string('PRODUIT', 50)->default('');
            $table->string('RESULTAT', 50)->default('');
            $table->string('SUIVI_PAR', 25)->default('')->index('SUIVI_PAR');
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
            $table->string('TYPE_EVENEMENT', 10)->default('');
            $table->string('VP_N_ACTION', 32)->default('')->index('VP_N_ACTION');
            $table->string('VP_N_AFFAIRE', 32)->default('')->index('VP_N_AFFAIRE');
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
        Schema::dropIfExists('action');
    }
}
