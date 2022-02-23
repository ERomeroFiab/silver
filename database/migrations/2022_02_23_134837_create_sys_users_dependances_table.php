<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersDependancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users_dependances', function (Blueprint $table) {
            $table->string('ID_SYS_USERS_DEPENDANCES', 32)->default('')->primary();
            $table->string('SYS_CODE_UTILISATEUR_LIE', 20)->default('')->index('SYS_CODE_UTILISATEUR_LIE');
            $table->string('SYS_CODE_UTILISATEUR_PRINCIPAL', 20)->default('')->index('SYS_CODE_UTILISATEUR_PRINCIPAL');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_users_dependances');
    }
}
