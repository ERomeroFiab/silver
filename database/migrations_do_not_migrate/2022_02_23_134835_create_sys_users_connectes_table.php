<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersConnectesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users_connectes', function (Blueprint $table) {
            $table->string('CODE_USER', 20)->default('')->primary();
            $table->string('DATE_HEURE', 20)->default('');
            $table->string('ID_SYS_USERS_CONNECTE', 32)->default('')->index('ID_SYS_USERS_CONNECTE');
            $table->string('NO_SESSION', 50)->default('');
            $table->date('SYS_DATE_CONNEXION')->nullable();
            $table->time('SYS_HEURE_CONNEXION')->default('00:00:00');
            $table->string('SYS_ID_FICHE_VERROUILLEE', 32)->default('')->index('SYS_ID_FICHE_VERROUILLEE');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_users_connectes');
    }
}
