<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affaire', function (Blueprint $table) {
            $table->string('BITRIX_KEY', 6)->default('');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CONCURRENT', 38)->default('');
            $table->date('DATE_PERTE')->nullable();
            $table->date('DATE_PREVISIONNEL')->nullable();
            $table->date('DATE_SIGNATURE')->nullable();
            $table->string('EMAIL', 100)->default('');
            $table->string('FAMILLE', 30)->default('');
            $table->string('ID_AFFAIRE', 32)->default('')->primary();
            $table->string('IT_COMPTEUR', 15)->default('')->index('IT_COMPTEUR');
            $table->binary('MEMO');
            $table->double('MONTANT_PONDERE')->default(0);
            $table->string('MOTIF_PERTE', 40)->default('');
            $table->string('NOM', 80)->default('');
            $table->string('NO_AFFAIRE', 20)->default('')->index('NO_AFFAIRE');
            $table->string('PHASE', 50)->default('');
            $table->string('PID_CONCURRENT', 32)->default('')->index('PID_CONCURRENT');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PRENOM', 36)->default('');
            $table->double('PROBABILITE')->default(0);
            $table->string('PRODUIT', 150)->default('');
            $table->string('STATUT', 25)->default('');
            $table->string('SUIVI_PAR', 25)->default('')->index('SUIVI_PAR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->double('TOTAL_PREVISIONNEL')->default(0);
            $table->string('VP_N_AFFAIRE', 15)->default('')->index('VP_N_AFFAIRE');
            $table->string('VP_N_CONTRAT_CADRE', 15)->default('');
            $table->string('VP_N_CONTRAT_PARTIEL', 15)->default('')->index('VP_N_CONTRAT_PARTIEL');
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
        Schema::dropIfExists('affaire');
    }
}
