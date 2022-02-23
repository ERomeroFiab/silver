<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcurrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concurrent', function (Blueprint $table) {
            $table->string('ADRESSE1', 36)->default('');
            $table->string('ADRESSE2', 36)->default('');
            $table->string('ADRESSE3', 36)->default('');
            $table->double('CA')->default(0);
            $table->string('CODE_POSTAL', 9)->default('');
            $table->string('COMPL_RAISON_SOC', 36)->default('');
            $table->string('EMAIL', 60)->default('');
            $table->string('ID_CONCURRENT', 32)->default('')->primary();
            $table->binary('NOTE');
            $table->string('PAYS', 43)->default('');
            $table->string('RAISON_SOC', 36)->default('');
            $table->string('SIREN', 9)->default('');
            $table->string('SITE_WEB', 60)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TELEPHONE', 16)->default('');
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
        Schema::dropIfExists('concurrent');
    }
}
