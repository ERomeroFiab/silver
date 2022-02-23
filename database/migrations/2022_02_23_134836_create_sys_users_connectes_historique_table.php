<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersConnectesHistoriqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users_connectes_historique', function (Blueprint $table) {
            $table->string('ID_SYS_USERS_CONNECTE_HISTORIQUE', 32)->default('')->primary();
            $table->string('PID_SYS_USERS_CONNECTE', 32)->default('')->index('PID_SYS_USERS_CONNECTE');
            $table->string('SYS_ADRESSE_IP', 20)->default('');
            $table->char('SYS_BOUTON_DECONNEXION_UTILISE', 1)->default('');
            $table->string('SYS_CODE_USER', 20)->default('')->index('SYS_CODE_USER');
            $table->date('SYS_DATE_CONNEXION')->nullable();
            $table->date('SYS_DATE_DECONNEXION')->nullable();
            $table->double('SYS_DUREE_CONNEXION')->default(0);
            $table->time('SYS_HEURE_CONNEXION')->default('00:00:00');
            $table->time('SYS_HEURE_DECONNEXION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_AGENT', 100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_users_connectes_historique');
    }
}
