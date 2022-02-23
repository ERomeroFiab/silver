<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysGroupesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_groupes_users', function (Blueprint $table) {
            $table->string('ID_SYS_GROUPES_USERS', 32)->default('')->primary();
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->string('SYS_GROUPE', 20)->default('')->index('SYS_GROUPE');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_NOM_GROUPE', 35)->default('');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
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
        Schema::dropIfExists('sys_groupes_users');
    }
}
