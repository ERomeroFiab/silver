<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysSynchroParametresDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_synchro_parametres_details', function (Blueprint $table) {
            $table->string('ID_SYS_SYNCHRO_PARAMETRES_DETAILS', 32)->default('')->primary();
            $table->string('PID_SYS_SYNCHRO_PARAMETRES', 32)->default('')->index('PID_SYS_SYNCHRO_PARAMETRES');
            $table->dateTime('SYS_DATE_SYNCHRO_POSTE')->nullable();
            $table->char('SYS_EXECUTION_AUTOMATIQUE_OK', 1)->default('');
            $table->double('SYS_FREQUENCE_EXECUTION_AUTO')->default(0);
            $table->double('SYS_HISTO_NB_ECHECS')->default(0);
            $table->double('SYS_HISTO_NB_SUCCES')->default(0);
            $table->double('SYS_HISTO_SYNCHRO')->default(0);
            $table->string('SYS_NOM_SCRIPT', 50)->default('')->index('SYS_NOM_SCRIPT');
            $table->double('SYS_NOTIFICATION_EXECUTION')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_synchro_parametres_details');
    }
}
