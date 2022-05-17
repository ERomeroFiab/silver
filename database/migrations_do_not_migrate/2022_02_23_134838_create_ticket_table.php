<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->string('A_TRAITER_PAR', 20)->default('')->index('A_TRAITER_PAR');
            $table->string('CIVILITE', 12)->default('');
            $table->string('CODE_CLIENT', 17)->default('')->index('CODE_CLIENT');
            $table->binary('COMMENTAIRE');
            $table->string('CONTRAT', 20)->default('')->index('CONTRAT');
            $table->date('DATE_RESOLUTON')->nullable();
            $table->string('DIFFUSION', 10)->default('')->index('DIFFUSION');
            $table->string('EMIS_PAR', 20)->default('')->index('EMIS_PAR');
            $table->string('E_MAIL', 50)->default('');
            $table->string('ID_TICKET', 32)->default('')->primary();
            $table->string('NOM', 36)->default('');
            $table->string('NUM_TICKET', 6)->default('')->index('NUM_TICKET');
            $table->string('N_VERSION', 15)->default('')->index('N_VERSION');
            $table->string('PARC', 20)->default('')->index('PARC');
            $table->char('PAS_ENVOI_MAIL', 1)->default('');
            $table->string('PERIMETRE', 80)->default('');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_CONTRAT', 32)->default('')->index('PID_CONTRAT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_PARC', 32)->default('')->index('PID_PARC');
            $table->string('PRENOM', 36)->default('');
            $table->string('PRIORITE', 10)->default('')->index('PRIORITE');
            $table->string('PRODUIT', 30)->default('')->index('PRODUIT');
            $table->string('RESUME', 100)->default('')->index('RESUME');
            $table->string('STATUT', 20)->default('')->index('STATUT');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('VISU_PAR', 20)->default('')->index('VISU_PAR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
