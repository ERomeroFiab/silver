<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_marketing', function (Blueprint $table) {
            $table->string('CATEGORIE', 20)->default('')->index('CATEGORIE');
            $table->string('CIVILITE', 12)->default('');
            $table->date('DATE_DEBUT')->nullable()->index('DATE_DEBUT');
            $table->date('DATE_FIN')->nullable()->index('DATE_FIN');
            $table->char('ENVOYE', 1)->default('');
            $table->string('E_MAIL', 50)->default('');
            $table->char('FAIT', 1)->default('');
            $table->string('FICHIER_ORIGINE', 30)->default('');
            $table->time('HEURE_DEBUT')->default('00:00:00');
            $table->time('HEURE_FIN')->default('00:00:00');
            $table->string('ID_ACTION_MARKETING', 32)->default('')->primary();
            $table->binary('MEMO');
            $table->string('NOM', 80)->default('');
            $table->string('NO_LOT', 13)->default('')->index('NO_LOT');
            $table->string('OBJET', 100)->default('');
            $table->string('PID_CAMPAGNE', 32)->default('')->index('PID_CAMPAGNE');
            $table->string('PID_CONTACT', 32)->default('')->index('PID_CONTACT');
            $table->string('PID_IDENTIFICATION', 32)->default('')->index('PID_IDENTIFICATION');
            $table->string('PID_LOT', 32)->default('')->index('PID_LOT');
            $table->string('PID_SUSPECTS', 32)->default('')->index('PID_SUSPECTS');
            $table->string('PRENOM', 36)->default('');
            $table->string('RAISON_SOC', 36)->default('')->index('RAISON_SOC');
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
            $table->string('TYPE_EVENEMENT', 10)->default('');
            $table->string('TYPE_LOT', 45)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_marketing');
    }
}
